<?php
ini_set('display_errors', 1);

require("../renoir_engine/autoload.php");
require_once("../rest_api/autoload.php");

try {
	require("src/api.class.php");
	\Rest_api\Api_bootstrap::set_api_config('config/oot.ini');
	\Rest_api\Api_bootstrap::run(new \OOT\Api);
}
catch(\Exception $e) {
	die('Error: '.$e->getMessage());
}
