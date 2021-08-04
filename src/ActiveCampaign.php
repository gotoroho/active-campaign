<?php

namespace Gotoroho\ActiveCampaign;

use Gotoroho\ActiveCampaign\Model\Contacts\Contact;
use Gotoroho\ActiveCampaign\Model\Contacts\ContactTag;
use Gotoroho\ActiveCampaign\Model\Contacts\Dto\ContactDto;
use Gotoroho\ActiveCampaign\Model\Contacts\Dto\ContactTagDto;
use Gotoroho\ActiveCampaign\Model\Dto\TagDto;
use Gotoroho\ActiveCampaign\Model\ECommerce\Customer;
use Gotoroho\ActiveCampaign\Model\ECommerce\Dto\CustomerDto;
use Gotoroho\ActiveCampaign\Model\ECommerce\Dto\OrderDto;
use Gotoroho\ActiveCampaign\Model\ECommerce\Order;
use Gotoroho\ActiveCampaign\Model\Tag;

class ActiveCampaign
{
    public function __construct(string $url, string $token)
    {
        Config::init($url, $token);
    }

    public function saveContact(ContactDto $contactDto): array
    {
        $contactModel = new Contact();

        return $contactModel->findOrCreate($contactDto);
    }

    /**
     * @param int $contactId
     * @param array $tags = ['Opencart', 'Poland']
     */
    public function saveContactTags(int $contactId, array $tags): void
    {
        $contactTagModel = new ContactTag();
        $tagModel = new Tag();

        foreach ($tags as $tag) {
            $tagDto = new TagDto($tag, $tag);
            $tag = $tagModel->findOrCreate($tagDto);

            $contactTagDto = new ContactTagDto($contactId, (int)$tag['id']);
            $contactTagModel->create($contactTagDto);
        }
    }

    public function saveCustomer(CustomerDto $customerDto): array
    {
        $customer = new Customer();

        return $customer->findOrCreate($customerDto);
    }

    public function saveOrder(OrderDto $orderDto): array
    {
        $order = new Order();

        return $order->create($orderDto);
    }
}