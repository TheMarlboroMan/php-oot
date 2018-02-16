<?php
namespace OOT;

class Api_newest_song extends \Rest_api\Resource implements \Rest_api\Api_get
{
	public function get($_input, \Rest_api\Request_headers $headers, array $get)
	{
		database_connect();

		$song=Song::get_latest();
		if(!$song) {
			return new \Rest_api\Response(json_encode(['result' => 'not_found']), \Rest_api\Definitions::STATUS_CODE_RESOURCE_NOT_FOUND);
		}
		else {
			$previous=Song::get_previous($song);
			$next=Song::get_next($song);
			$result=['song' => Song::get_public_data($song),
				'previous' => $previous ? $previous->get_slug() : null,
				'next' => $next ? $next->get_slug() : null];

			return new \Rest_api\Response(json_encode($result), \Rest_api\Definitions::STATUS_CODE_OK);
		}
	}
};
