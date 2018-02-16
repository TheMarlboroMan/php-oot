<?php

namespace OOT;

class Song_sql extends \Base_textos_sql
{
	public function TABLA() {return Song::TABLA;}
	public function ORDEN_DEFECTO() {return "date DESC";}
	public function CRITERIO_DEFECTO() {return 'AND TRUE';}
	public function VER_TODO() {return 'TRUE';}
	public function VER_VISIBLE() {return 'TRUE';}
	public function VER_PUBLICO() {return 'TRUE';}

	public function TEXTOS_CREAR_TABLAS()
	{	
		$TABLE=$this->TABLA();
		$result=[
			"DROP TABLE IF EXISTS ".$TABLE.";",
			"CREATE TABLE ".$TABLE."
(
	id		INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	datetime_created	DATETIME NOT NULL,
	date		DATETIME NOT NULL,
	title		VARCHAR(200) NOT NULL,
	slug		VARCHAR(200) NOT NULL,
	intro		TEXT NOT NULL,
	audio_url	VARCHAR(200) NOT NULL,
	image_url	VARCHAR(200) NOT NULL,
	image_title	VARCHAR(200) NOT NULL,
	main_text	TEXT NOT NULL,
	credits		TEXT NOT NULL

);",
			"ALTER TABLE ".$TABLE." ADD UNIQUE (slug);"
		];

		return $result;
	}

	public function get_latest() {
		
		return $this->obtener_publico(null, null, 1);
	}

	public function get_by_slug($slug) {

		$criteria="AND slug='".$slug."'";
		return $this->obtener_publico($criteria, null, 1);
	}

	public function get_previous($id, $date) {
		$criteria="AND id!='".$id."'
AND date < '".$date."'";

		return $this->obtener_publico($criteria, "date DESC", 1);
	}

	public function get_next($id, $date) {

		$criteria="AND id!='".$id."'
AND date > '".$date."'";

		return $this->obtener_publico($criteria, "date ASC", 1);

		//TODO: Now, this is interesting...
	}
};
