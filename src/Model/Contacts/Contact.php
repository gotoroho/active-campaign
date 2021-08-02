<?php

namespace Gotoroho\ActiveCampaign\Model\Contacts;

use Gotoroho\ActiveCampaign\Model\Contacts\Dto\ContactDto;
use Gotoroho\ActiveCampaign\Query;
use Gotoroho\ActiveCampaign\Request;

class Contact
{
    const URL = "contacts";

    public function create(ContactDto $contactDto): array
    {
        $request = new Request(self::URL);

        $response = $request->setCustomRequest("POST")->setPostFields(json_encode([
            "contact" => [
                "email" => $contactDto->getEmail(),
                "firstName" => $contactDto->getFirstname(),
                "lastName" => $contactDto->getLastname(),
                "phone" => $contactDto->getTelephone(),
            ]
        ]))->exec();

        return $response->getDataArray()['contact'];
    }

    public function findByEmail(string $email): array
    {
        $filterQuery = Query::fromArray([
            "email" => $email
        ]);

        $request = new Request(self::URL . $filterQuery);

        $response = $request->setCustomRequest("GET")->exec();

        return $response->getDataArray();
    }

    public function findOrCreate(ContactDto $contactDto)
    {
        $customers = $this->findByEmail($contactDto->getEmail());

        if ((int)$customers['meta']['total'] > 0) {
            return $customers[self::URL][0];
        }

        return $this->create($contactDto);
    }

//    public function delete(string $id): void
//    {
//        $request = new Request(self::URL . "/$id");
//
//        $request->setCustomRequest("DELETE")->exec();
//    }
}