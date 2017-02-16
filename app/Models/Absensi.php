<?php

namespace Model;

class Absensi extends \BaseModel
{
	/*
	 |--------------------------------------------------------------------------
	 | General Setups
	 |--------------------------------------------------------------------------
	 */

	protected $table = 'absensi';
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
	public static $rules;
	public static $customMessages;
	public static $relationsData = array(
		'Siswa' 	=> array(self::BELONGS_TO, 'Model\Siswa'),
		'checkBy' 	=> array(self::BELONGS_TO, 'App\User'),
		'Kelas' 	=> array(self::BELONGS_TO, 'Model\Kelas'),

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
		'check_by','siswa','kelas'
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

	 public function getCheckbyAttribute()
	 {
	 	return $this->checkBy()->first();
	 }

	 public function getSiswaAttribute()
	 {
	 	return $this->Siswa()->first();
	 }

	 public function getKelasAttribute()
	 {
	 	return $this->Kelas()->first();
	 }
}
