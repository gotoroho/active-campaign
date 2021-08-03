<?php

namespace Gotoroho\ActiveCampaign\Model\ECommerce\Dto;

class OrderDto
{
    private string $email;
    private int $externalId;
    private array $orderProducts;
    private string $externalCreatedDate;
    private float $totalPrice;
    private string $currency;
    private int $customerId;

    public function __construct(
        int $externalId,
        string $email,
        array $orderProducts,
        string $externalCreatedDate,
        float $totalPrice,
        string $currency,
        int $customerId
    )
    {
        $this->externalId = $externalId;
        $this->email = $email;
        $this->orderProducts = $orderProducts;
        $this->externalCreatedDate = $externalCreatedDate;
        $this->totalPrice = $totalPrice;
        $this->currency = $currency;
        $this->customerId = $customerId;
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return array
     */
    public function getOrderProducts(): array
    {
        return $this->orderProducts;
    }

    /**
     * @return string
     */
    public function getExternalCreatedDate(): string
    {
        return $this->externalCreatedDate;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }
}