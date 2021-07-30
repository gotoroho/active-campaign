<?php

namespace Gotoroho\ActiveCampaign\Model\Contacts;

use Gotoroho\ActiveCampaign\Model\Contacts\Dto\ContactDto;
use Gotoroho\ActiveCampaign\Model\Model;
use Gotoroho\ActiveCampaign\Query;
use Gotoroho\ActiveCampaign\Request;

class Contact extends Model
{
    protected string $path = "contacts";

    public function create(ContactDto $contactDto): array
    {
        $request = new Request($this->url, $this->token);

        $response = $request->setCustomRequest("POST")->setPostFields(json_encode([
            "contact" => [
                "email" => $contactDto->getEmail(),
                "firstName" => $contactDto->getFirstname(),
                "lastName" => $contactDto->getLastname(),
                "phone" => $contactDto->getTelephone(),
            ]
        ]))->exec();

        return $response->getDataArray();
    }

    public function findByEmail(string $email): array
    {
        $filterQuery = Query::fromArray([
            "email" => $email
        ]);

        $request = new Request($this->url . $filterQuery, $this->token);

        $response = $request->setCustomRequest("GET")->exec();

        return $response->getDataArray();
    }

    public function findOrCreate(ContactDto $contactDto)
    {
        $customers = $this->findByEmail($contactDto->getEmail());

        if ((int)$customers['meta']['total'] > 0) {
            return $customers[$this->path][0];
        }

        return $this->create($contactDto);
    }
}