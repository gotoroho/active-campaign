<?php

namespace Gotoroho\ActiveCampaign;

use Gotoroho\ActiveCampaign\Model\ECommerce\Connection;

class Config
{
    private static string $url;
    private static string $token;
    private static bool $inited = false;

    private static int $connectionId;

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

    public static function getConnectionId(): int
    {
        $connection = new Connection();
        return (int)$connection->findOrCreate()['id'];
    }
}