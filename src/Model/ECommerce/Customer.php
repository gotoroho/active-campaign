<?php

namespace Gotoroho\ActiveCampaign\Model\ECommerce;

use Gotoroho\ActiveCampaign\Query;
use Gotoroho\ActiveCampaign\Request;

class Customer
{
    const URL = "ecomCustomers";

    public function create($externalId, $email): array
    {
        $request = new Request(self::URL);

        $connectionModel = new Connection();
        $connection = $connectionModel->findOrCreate();

        $response = $request->setCustomRequest("POST")->setPostFields(json_encode([
            "ecomCustomer" => [
                "connectionid" => $connection['id'],
                "externalid" => $externalId,
                "email" => $email,
                "acceptsMarketing" => "0"
            ]
        ]))->exec();

        return $response->getDataArray();
    }

    public function findByEmail($email): array
    {
        $filterQuery = Query::fromArray([
            "filters[email]" => $email,
        ]);

        $request = new Request(self::URL . $filterQuery);

        $response = $request->setCustomRequest("GET")->exec();

        return $response->getDataArray();
    }

    public function findOrCreate(int $externalId, string $email)
    {
        $customers = $this->findByEmail($email);

        if ((int)$customers['meta']['total'] > 0) {
            return $customers[self::URL][0];
        }

        return $this->create($externalId, $email);
    }
}