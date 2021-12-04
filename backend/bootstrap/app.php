<?php

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../src/config/db.php";

session_start();


$app = new \Slim\App([

	"settings" => [
		"displayErrorDetails" =>true,

	]

]);


require __DIR__ . "/../app/routes.php";