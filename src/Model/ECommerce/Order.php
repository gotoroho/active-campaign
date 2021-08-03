<?php

namespace Gotoroho\ActiveCampaign\Model\ECommerce;

use Gotoroho\ActiveCampaign\Config;
use Gotoroho\ActiveCampaign\Model\ECommerce\Dto\OrderDto;
use Gotoroho\ActiveCampaign\Request;

class Order
{
    const URL = "ecomOrders";

    public function create(OrderDto $orderDto): array
    {
        $request = new Request(self::URL);

        $post = json_encode([
            "ecomOrder" => [
                "externalid" => $orderDto->getExternalId(),
                "source" => 1, // 0 - historical, 1 - real-time
                "email" => $orderDto->getEmail(),
                "orderProducts" => $orderDto->getOrderProducts(),
                "externalCreatedDate" => $orderDto->getExternalCreatedDate(),
                "totalPrice" => $orderDto->getTotalPrice(),
//                "shippingAmount" => 200,
//                "taxAmount" => 500,
//                "discountAmount" => 100,
                "currency" => $orderDto->getCurrency(),
                "connectionid" => Config::getConnectionId(),
                "customerid" => $orderDto->getCustomerid(),
            ]
        ]);

        $response = $request->setCustomRequest("POST")->setPostFields($post)->exec();

        return $response->getDataArray()['ecomOrder'];
    }

//    private function delete(string $id): void
//    {
//        $request = new Request(self::URL . "/$id");
//
//        $request->setCustomRequest("DELETE")->exec();
//    }
}