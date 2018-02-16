<?php

namespace OOT;

class Song extends \Contenido_bbdd
{
	const TABLA='oot_songs';
	const ID='id';

	public function NOMBRE_CLASE() {return "OOT\Song";}
	public function TABLA() {return self::TABLA;}
	public function ID() {return self::ID;}

	private static $dictionary=array(
		'id' => 'id',
		'datetime_created' => 'datetime_created',
		'date' => 'date',
		'title' => 'title',
		'slug' => 'slug',
		'intro' => 'intro',
		'audio_url' => 'audio_url',
		'image_url' => 'image_url',
		'image_title' => 'image_title',
		'main_text' => 'main_text',
		'credits' => 'credits'
	);

	protected $id=null;
	protected $datetime_created=null;
	protected $date=null;
	protected $title=null;
	protected $slug=null;
	protected $intro=null;
	protected $audio_url=null;
	protected $image_url=null;
	protected $image_title=null;
	protected $main_text=null;
	protected $credits=null;

	public function	get_id() {return (int)$this->id;}
	public function get_datetime_create() {return $this->datetime_created;}
	public function	get_date() {return $this->date;}
	public function	get_title() {return $this->title;}
	public function get_slug() {return $this->slug;}
	public function get_intro() {return $this->intro;}
	public function get_audio_url() {return $this->audio_url;}
	public function get_image_url() {return $this->image_url;}
	public function get_image_title() {return $this->image_title;}
	public function get_main_text() {return $this->main_text;}
	public function get_credits() {return $this->credits;}
	
	public function __construct(&$data=null)
	{
		parent::__construct($data, self::$dictionary, self::TABLA, self::ID);
	}

	public function create(&$input)
	{
		//TODO: Probably invert date.
		if(isset($input['datetime_created'])) unset($input['datetime_created']);
		return parent::base_crear($input, 'datetime_created', 'NOW()');
	}

	public function update(&$input=null)
	{	
		if(!$input) throw new \Exception("Unable to update database entity without input");
		//TODO: Probably invert date.

		return parent::base_modificar($input);
	}

	public function delete(&$data=null)
	{
		return parent::base_eliminar_fisico($data);
	}

	public static function get_latest() {

		$s=new Song_sql();
		$dummy=new Song();
		$result=$dummy->obtener_objeto_por_texto($s->get_latest());
		return $result;
	}

	public static function get_by_slug($slug) {

		$s=new Song_sql();
		$dummy=new Song();
		$result=$dummy->obtener_objeto_por_texto($s->get_by_slug($slug));
		return $result;
	}

	public static function get_previous(Song $song) {
		$s=new Song_sql();
		$dummy=new Song();
		$result=$dummy->obtener_objeto_por_texto($s->get_previous($song->id, $song->date));
		return $result;
	}

	public static function get_next(Song $song) {
		$s=new Song_sql();
		$dummy=new Song();
		$result=$dummy->obtener_objeto_por_texto($s->get_next($song->id, $song->date));
		return $result;
	}

	public static function get_public_data(Song $song) {

		return ['date' => date_format(new \DateTime($song->date), 'Y-m-d'),
			'title' => $song->title,
			'intro' => $song->intro,
			'audio_url' => $song->audio_url, 
			'image_url' => $song->image_url,
			'image_title' => $song->image_title,
			'main_text' => $song->main_text,
			'credits' => $song->credits];
	}
};
