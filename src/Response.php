<?php

namespace Gotoroho\ActiveCampaign;

class Response
{
    /**
     * @var mixed
     */
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    public function getDataArray(): array
    {
        return json_decode($this->data, true);
    }
}