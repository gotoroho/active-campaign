<?php

namespace Gotoroho\ActiveCampaign\Model\ECommerce;

use Gotoroho\ActiveCampaign\Query;
use Gotoroho\ActiveCampaign\Request;

class Connection
{
    const URL = "connections";

    const DEFAULT_DATA = [
        "service" => "opencart",
        "externalid" => "upline",
        "name" => "Opencart Upline",
        "logoUrl" => "https://pl.escapewelt.com/img/logo.png",
        "linkUrl" => "https://pl.escapewelt.com/"
    ];

    public function create(): array
    {
        $request = new Request(self::URL);

        $response = $request->setCustomRequest("POST")->setPostFields(json_encode([
            "connection" => self::DEFAULT_DATA
        ]))->exec();

        return $response->getDataArray();
    }

    public function findByService(): array
    {
        $filterQuery = Query::fromArray([
            "filters[service]" => self::DEFAULT_DATA['service'],
        ]);

        $request = new Request(self::URL . $filterQuery);

        $response = $request->setCustomRequest("GET")->exec();

        return $response->getDataArray();
    }

    public function findOrCreate()
    {
        $customers = $this->findByService();

        if ((int)$customers['meta']['total'] > 0) {
            return $customers[self::URL][0];
        }

        return $this->create();
    }

    public function listAll(): array
    {
        $request = new Request(self::URL);

        $response = $request->setCustomRequest("GET")->exec();

        return $response->getDataArray();
    }

//    public function delete(int $id): array
//    {
//        $request = new Request($this->url . "/$id", $this->token);
//
//        $response = $request->setCustomRequest("DELETE")->exec();
//
//        return $response->getDataArray();
//    }
}