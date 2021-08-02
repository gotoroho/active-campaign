<?php

namespace Gotoroho\ActiveCampaign;

use Gotoroho\ActiveCampaign\Model\Contacts\Contact;
use Gotoroho\ActiveCampaign\Model\Contacts\Dto\ContactDto;
use Gotoroho\ActiveCampaign\Model\ECommerce\Customer;
use Gotoroho\ActiveCampaign\Model\ECommerce\Dto\CustomerDto;

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

    public function saveCustomer(CustomerDto $customerDto)
    {
        $customer = new Customer();

        return $customer->findOrCreate($customerDto);
    }

    public function test()
    {
        $customer = new Customer();
        return $customer->test();

//        $contact = new Contact();
//        return $contact->findByEmail($email);
//        return $contact->delete(79852);

//        $connection = new Connection();
//        return $connection->listAll();
    }
}