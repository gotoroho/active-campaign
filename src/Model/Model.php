<?php

namespace Gotoroho\ActiveCampaign\Model;

abstract class Model
{
    protected string $path = "";
    protected string $url;
    protected string $token;

    public function __construct(string $token, string $url)
    {
        $this->token = $token;
        $this->url = $url . $this->path;
    }
}