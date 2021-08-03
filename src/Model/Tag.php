<?php

namespace Gotoroho\ActiveCampaign\Model;

use Gotoroho\ActiveCampaign\Model\Dto\TagDto;
use Gotoroho\ActiveCampaign\Query;
use Gotoroho\ActiveCampaign\Request;

class Tag
{
    const URL = "tags";
    const TYPE = "contact";

    public function create(TagDto $tagDto): array
    {
        $request = new Request(self::URL);

        $post = json_encode([
            "tag" => [
                "tag" => $tagDto->getName(),
                "tagType" => self::TYPE,
                "description" => $tagDto->getDescription(),
            ]
        ]);

        $response = $request->setCustomRequest("POST")->setPostFields($post)->exec();

        return $response->getDataArray()['tag'];
    }

    public function findDefault(TagDto $tagDto): array
    {
        $filterQuery = Query::fromArray([
            "search" => $tagDto->getName(),
        ]);

        $request = new Request(self::URL . $filterQuery);

        $response = $request->setCustomRequest("GET")->exec();

        return $response->getDataArray();
    }

    public function findOrCreate(TagDto $tagDto)
    {
        $tags = $this->findDefault($tagDto);

        if ((int)$tags['meta']['total'] > 0) {
            return $tags[self::URL][0];
        }

        return $this->create($tagDto);
    }

//    public function delete(string $id): void
//    {
//        $request = new Request(self::URL . "/$id");
//
//        $request->setCustomRequest("DELETE")->exec();
//    }
}