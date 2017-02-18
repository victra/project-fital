<?php

namespace Model;

class Kelas extends \BaseModel
{
	/*
	 |--------------------------------------------------------------------------
	 | General Setups
	 |--------------------------------------------------------------------------
	 */

	protected $table = 'kelas';
	protected $fillable = ['',];
	protected $hidden = [
		'updated_at',
		'deleted_at',
	];

	/*
	 |--------------------------------------------------------------------------
	 | Ardent Setups
	 |--------------------------------------------------------------------------
	 */

	public $autoPurgeRedundantAttributes = true;
	public $autoHydrateEntityFromInput = true; // For new entries only
	public $forceEntityHydrationFromInput = true; // Also for Update
	public static $passwordAttributes  = array('');
	public $autoHashPasswordAttributes = true;
	public static $rules = array(
		'nama_kelas' => 'required|max:15|unique',
		'jurusan' => 'required',
		'wali_kelas_id' => 'required'
		);
	public static $customMessages = 'custom' => array(
    	'nama_kelas' => array(
	        'required' => 'Nama Kelas harus diisi',
	        'max' => 'Maksimal 15 karakter',
	        'unique' => 'Nama Kelas sudah ada'
    	),
    	'jurusan' => array(
	        'required' => 'Jurusan harus diisi'
    	),
    	'wali_kelas_id' => array(
	        'required' => 'Wali Kelas harus diisi'
    	)
	);
	public static $relationsData = array(
		'waliKelas' 	=> array(self::BELONGS_TO, 'App\User'),
	);

	/*
	 |--------------------------------------------------------------------------
	 | General Functions
	 |--------------------------------------------------------------------------
	 */

	public static function boot()
	{
		parent::boot();
		self::setRules();
	}

	public static function setRules()
	{
		$rules = array();
		$messages = array();

		self::$rules = $rules;
		self::$customMessages = $messages;
	}

	/*
	 |--------------------------------------------------------------------------
	 | Hooks
	 |--------------------------------------------------------------------------
	 */

	public function beforeSave()
	{

	}

	public function afterCreate()
	{
	}

	/*
	|--------------------------------------------------------------------------
	| Custom Setups
	|--------------------------------------------------------------------------
	*/
	protected $appends = array(
		'walikelas',
	);


	/*
	 |--------------------------------------------------------------------------
	 | Methods
	 |--------------------------------------------------------------------------
	 */

	/*
	 |--------------------------------------------------------------------------
	 | Admin
	 |--------------------------------------------------------------------------
	 */

	/*
	 |--------------------------------------------------------------------------
	 | Appends & Attributes
	 |--------------------------------------------------------------------------
	 */

	 public function getWalikelasAttribute()
	 {
	 	return $this->waliKelas()->first();
	 }
}
