<?php
namespace OOT;

function database_connect() {

	$cfg=\Rest_api\Api_bootstrap::get_api_config();	

	\Consulta_mysql::conectar($cfg->get('database_host'), $cfg->get('database_user'), $cfg->get('database_pass'), $cfg->get('database_name'));
}
