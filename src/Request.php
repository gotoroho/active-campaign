<?php

namespace Gotoroho\ActiveCampaign;

use Error;

class Request
{
    private $curl;

    public function __construct($urlPostfix)
    {
        list($url, $token) = Config::getData();

        $this->curl = curl_init();

        curl_setopt_array($this->curl, [
            CURLOPT_URL => $url . $urlPostfix,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Api-Token: " . $token,
            ],
        ]);
    }

    public function setCustomRequest(string $method): Request
    {
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);
        return $this;
    }

    public function setPostFields(string $postFields): Request
    {
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $postFields);
        return $this;
    }

    public function exec(): Response
    {
        $response = curl_exec($this->curl);
        $err = curl_error($this->curl);

        curl_close($this->curl);

        if ($err) {
            throw new Error("PHP curl Error #: " . $err);
        }

        return new Response($response);
    }
}