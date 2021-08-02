<?php

namespace Gotoroho\ActiveCampaign\Model\Dto;

class TagDto
{
    private string $name;
    private string $description;

    public function __construct(
        string $name,
        string $description
    )
    {
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}