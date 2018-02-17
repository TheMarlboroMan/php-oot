<?php
namespace OOT;

//Application dependant stuff.

class Api implements \Rest_api\Api_instance {

	public function get_app_dependencies_path() {

		$path=\Rest_api\Api_bootstrap::get_api_config()->get('server_path');
		return [$path.'src/autoload.php',
			$path.'src/model/song.class.php',
			$path.'src/model/song.sql.php'];
	}
	
	public function create_exception_handler() {
		return function($e) {
			switch(get_class($e)){
				case 'OOT\App_exception':
					\Rest_api\Log::log($e->getMessage()." ".$e->getCode()."\nTHAT WAS AN APP_EXCEPTION. THIS IS api.class.php FILE\n");
					throw new \Exception($e->getMessage(), $e->getCode());
				break;
			}
		};
	}

	public function get_full_log_path() {
		return \Rest_api\Api_bootstrap::get_api_config()->get('server_path').'log/oot.log';
	}

	public function get_full_api_class_path() {
		return \Rest_api\Api_bootstrap::get_api_config()->get('server_path')."src/api/";
	}
};
