<?php

namespace Gotoroho\ActiveCampaign\Model\ECommerce\Dto;

class CustomerDto
{
    private string $email;
    private int $externalId;

    public function __construct(
        int $externalId,
        string $email
    )
    {
        $this->externalId = $externalId;
        $this->email = $email;
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
}