<?php

namespace Gotoroho\ActiveCampaign\Model\Contacts\Dto;

class ContactTagDto
{
    private int $contactId;
    private int $tagId;

    public function __construct(
        int $contactId,
        int $tagId
    )
    {
        $this->contactId = $contactId;
        $this->tagId = $tagId;
    }

    /**
     * @return int
     */
    public function getContactId(): int
    {
        return $this->contactId;
    }

    /**
     * @return int
     */
    public function getTagId(): int
    {
        return $this->tagId;
    }
}