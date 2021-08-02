<?php

require "vendor/autoload.php";

use Gotoroho\ActiveCampaign\ActiveCampaign;
use Gotoroho\ActiveCampaign\Model\Contacts\Dto\ContactDto;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$activeCampaign = new ActiveCampaign($_ENV["URL"], $_ENV["TOKEN"]);

$contactDto = new ContactDto('test@test.test', 'testname', 'testlastname', 'testphone');
$contact = $activeCampaign->saveContact($contactDto);

$activeCampaign->saveContactTags((int)$contact['id'], ['Opencart', 'Poland']);
