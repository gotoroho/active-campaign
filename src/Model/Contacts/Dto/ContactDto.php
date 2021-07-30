<?php

namespace Gotoroho\ActiveCampaign\Model\Contacts\Dto;

class ContactDto
{
    private string $email;
    private string $firstname;
    private string $lastname;
    private string $telephone;

    public function __construct(
        string $email,
        string $firstname,
        string $lastname,
        string $telephone
    )
    {
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->telephone = $telephone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }
}