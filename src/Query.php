<?php

namespace Gotoroho\ActiveCampaign;

class Query
{
    public static function fromArray(array $params): string
    {
        $query = "";

        if (!empty($params)) {
            $query .= "?";
        }

        $paramsArr = [];
        foreach ($params as $name => $value) {
            $paramsArr[] = $name . "=" . urlencode($value);
        }

        $query .= join("&", $paramsArr);

        return $query;
    }
}