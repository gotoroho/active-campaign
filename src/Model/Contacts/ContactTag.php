<?php

namespace Gotoroho\ActiveCampaign\Model\Contacts;

use Gotoroho\ActiveCampaign\Model\Contacts\Dto\ContactTagDto;
use Gotoroho\ActiveCampaign\Request;

class ContactTag
{
    const URL = "contactTags";

    public function create(ContactTagDto $contactTagDto): array
    {
        $request = new Request(self::URL);

        $response = $request->setCustomRequest("POST")->setPostFields(json_encode([
            "contactTag" => [
                "contact" => $contactTagDto->getContactId(),
                "tag" => $contactTagDto->getTagId(),
            ]
        ]))->exec();

        return $response->getDataArray()['contactTag'];
    }
}