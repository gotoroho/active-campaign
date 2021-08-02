<?php

namespace Gotoroho\ActiveCampaign;

use Gotoroho\ActiveCampaign\Model\Contacts\Contact;
use Gotoroho\ActiveCampaign\Model\Contacts\Dto\ContactDto;

class ActiveCampaign
{
    public function __construct(string $url, string $token)
    {
        Config::init($url, $token);
    }

    public function saveContact(ContactDto $contactDto)
    {
        $contact = new Contact();

        return $contact->findOrCreate($contactDto);
    }
}