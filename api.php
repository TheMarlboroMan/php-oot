<?php
ini_set('display_errors', 1);

//Load renoir engine...
require("../renoir_engine/autoload.php");

//Load REST API.
require_once("../rest_api/autoload.php");

//Load application fundamentals...
//TODO: When done: https://help.github.com/articles/removing-sensitive-data-from-a-repository/
\Rest_api\Api_bootstrap::set_api_config('config/oot.ini');

require("src/api.class.php");

//Logic.
$instance=new \OOT\Api;
\Rest_api\Api_bootstrap::run($instance);

//curl -X POST|GET|PUT|DELETE "http://localhost/oot/api/shit?hola=1&cosa=2" -H "Content-type: text/plain" -d "Hello"
