<?php

namespace Gotoroho\ActiveCampaign;

use Gotoroho\ActiveCampaign\Model\Contacts\Contact;
use Gotoroho\ActiveCampaign\Model\Contacts\Dto\ContactDto;

class ActiveCampaign
{
    private string $url;
    private string $token;

    public function __construct(string $url, string $token)
    {
        $this->url = $url;
        $this->token = $token;
    }

    public function saveContact(ContactDto $contactDto)
    {
        $customer = new Contact($this->token, $this->url);

        return $customer->findOrCreate($contactDto);
    }
}