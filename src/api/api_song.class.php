<?php
namespace OOT;

class Api_song extends \Rest_api\Resource implements \Rest_api\Api_get
{
	public function get($_input, \Rest_api\Request_headers $headers, array $get)
	{
		database_connect();

		die('fuuuuck');

		//TODO: HERE I AM!!!.
//		$token=get_and_refresh_token_from_headers($headers);
//		$user=get_verified_user_from_token($token);
		return new \Rest_api\Response(json_encode(User::get_public_data($user)), \Rest_api\Definitions::STATUS_CODE_OK);
	}
};
