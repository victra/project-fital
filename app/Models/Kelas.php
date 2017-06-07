<?php

namespace Model;
use DB;
use Illuminate\Support\Facades\Input;

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
	public static $rules;
	public static $customMessages;
	public static $relationsData = array(
		'waliKelas' 	=> array(self::BELONGS_TO, 'App\User'),
		'siswa'	=> array(self::HAS_MANY, 'Model\Siswa'),
		'absensi'	=> array(self::HAS_MANY, 'Model\Absensi'),
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

	 // Jumlah Sakit
	 public function getSakithAttribute()
	 {
	 	if (Input::has('tanggal')) {
            $tanggal = Input::get('tanggal');
        } else {
            $tanggal = date("Y-m-d");
        }

        if ($tanggal) {
		 	return $this->absensi()->where('date', $tanggal)->where('status','S')->count();
        }

        return null;
	 }

	 // Jumlah Izin
	 public function getIzinhAttribute()
	 {
	 	if (Input::has('tanggal')) {
            $tanggal = Input::get('tanggal');
        } else {
            $tanggal = date("Y-m-d");
        }

        if ($tanggal) {
		 	return $this->absensi()->where('date', $tanggal)->where('status','I')->count();
        }

        return null;
	 }

	 // Jumlah Alpa
	 public function getAlpahAttribute()
	 {
	 	if (Input::has('tanggal')) {
            $tanggal = Input::get('tanggal');
        } else {
            $tanggal = date("Y-m-d");
        }

        if ($tanggal) {
		 	return $this->absensi()->where('date', $tanggal)->where('status','A')->count();
        }

        return null;
	 }

	 // Total
	 public function getTotalhAttribute()
	 {
	 	if (Input::has('tanggal')) {
            $tanggal = Input::get('tanggal');
        } else {
            $tanggal = date("Y-m-d");
        }

        if ($tanggal) {
		 	return $this->absensi()->where('date', $tanggal)->where('status','!=','H')->count();
        }

        return null;
	 }

	 // Cek Absen
	 public function getCekabsenAttribute()
	 {
	 	if (Input::has('tanggal')) {
            $tanggal = Input::get('tanggal');
        } else {
            $tanggal = date("Y-m-d");
        }

        if ($tanggal) {
		 	return $this->absensi()->where('date', $tanggal)->where('status','!=','')->count();
        }

        return null;
	 }
}
