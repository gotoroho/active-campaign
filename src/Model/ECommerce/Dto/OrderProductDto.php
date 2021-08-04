<?php

namespace Gotoroho\ActiveCampaign\Model\ECommerce\Dto;

class OrderProductDto
{
    private int $externalId;
    private string $name;
    private float $price;
    private int $quantity;

    public function __construct(
        int $externalId,
        string $name,
        float $price,
        int $quantity
    )
    {
        $this->externalId = $externalId;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getExternalId(): int
    {
        return $this->externalId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
}