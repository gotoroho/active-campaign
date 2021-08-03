<?php

namespace Gotoroho\ActiveCampaign\Model\ECommerce;

use Gotoroho\ActiveCampaign\Config;
use Gotoroho\ActiveCampaign\Model\ECommerce\Dto\CustomerDto;
use Gotoroho\ActiveCampaign\Query;
use Gotoroho\ActiveCampaign\Request;

class Customer
{
    const URL = "ecomCustomers";

    public function create(CustomerDto $customerDto): array
    {
        $request = new Request(self::URL);

        $post = json_encode([
            "ecomCustomer" => [
                "connectionid" => Config::getConnectionId(),
                "externalid" => $customerDto->getExternalId(),
                "email" => $customerDto->getEmail(),
                "acceptsMarketing" => "0"
            ]
        ]);

        $response = $request->setCustomRequest("POST")->setPostFields($post)->exec();

        return $response->getDataArray()['ecomCustomer'];
    }

    public function find(int $id): array
    {
        $request = new Request(self::URL . "/$id");

        $response = $request->setCustomRequest("GET")->exec();

        return $response->getDataArray();
    }

    public function findByEmail(string $email): array
    {
        $filterQuery = Query::fromArray([
            "filters[email]" => $email,
        ]);

        $request = new Request(self::URL . $filterQuery);

        $response = $request->setCustomRequest("GET")->exec();

        return $response->getDataArray();
    }

    public function findOrCreate(CustomerDto $customerDto): array
    {
        $customers = $this->findByEmail($customerDto->getEmail());

        if ((int)$customers['meta']['total'] > 0) {
            return $customers[self::URL][0];
        }

        return $this->create($customerDto);
    }

//    private function delete(string $id): void
//    {
//        $request = new Request(self::URL . "/$id");
//
//        $request->setCustomRequest("DELETE")->exec();
//    }
}