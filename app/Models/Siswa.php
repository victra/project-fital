<?php

namespace Model;

use Illuminate\Support\Facades\Input;

class Siswa extends \BaseModel
{
	/*
	 |--------------------------------------------------------------------------
	 | General Setups
	 |--------------------------------------------------------------------------
	 */

	protected $table = 'siswa';
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
		'kelas' 	=> array(self::BELONGS_TO, 'Model\Kelas'),
		'absensi'	=> array(self::HAS_MANY, 'Model\Absensi'),
	);

	/*
	 |--------------------------------------------------------------------------
	 | General Functions
	 |--------------------------------------------------------------------------
	 */

	// public function absensi()
	// {
	// 	return $this->hasMany('Model\Absensi');
	// }

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
		'kelas',
		'absensi',
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

	public function getKelasAttribute()
	{
	 	return $this->kelas()->first();
	}

	public function getAbsensiNonPermanentAttribute()
	{
	 	if (Input::has('tanggal')) {
            $tanggal = Input::get('tanggal');
        } else {
            $tanggal = date("Y-m-d");
        }

        if ($tanggal && Input::has('search_kelas')) {
		 	return $this->absensi()->where('date', $tanggal)->first();
        }
        return null;
	}

	//ini yang permanent
	public function getAbsensiAttribute()
	{
	 	if (Input::has('tanggal')) {
            $tanggal = Input::get('tanggal');
        } else {
            $tanggal = date("Y-m-d");
        }

        if ($tanggal && Input::has('search_kelas')) {
		 	return $this->absensi()->where('date', $tanggal)->first();
        }
        return null;
	}
}
