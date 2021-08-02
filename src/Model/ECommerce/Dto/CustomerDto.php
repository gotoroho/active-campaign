<?php

namespace Gotoroho\ActiveCampaign\Model\ECommerce\Dto;

class CustomerDto
{
    private string $email;
    private int $connectionId;
    private int $externalId;

    public function __construct(
        int $connectionId,
        int $externalId,
        string $email
    )
    {
        $this->connectionId = $connectionId;
        $this->externalId = $externalId;
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getConnectionId(): int
    {
        return $this->connectionId;
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