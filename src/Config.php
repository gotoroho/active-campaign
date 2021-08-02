<?php

namespace Gotoroho\ActiveCampaign;

class Config
{
    private static bool $inited = false;

    private static string $url;
    private static string $token;

    private function __construct() {}

    private function __clone() {}

    public static function init(string $url, string $token)
    {
        self::$url = $url;
        self::$token = $token;
        self::$inited = true;
    }

    public static function getData(): array
    {
        if (!self::$inited) {
            throw new \Error("Config wasn't initialised!");
        }

        return [
            self::$url,
            self::$token,
        ];
    }
}