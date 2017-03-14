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
		// 'absensi',
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

	// Jumlah Sakit
	public function getSakitAttribute()
	{
		if (Input::has('dari_tanggal')) {
            $dari_tanggal = Input::get('dari_tanggal');
            $daystosum = '6';
            $sampai_tanggal = date('Y-m-d', strtotime($dari_tanggal.' + '.$daystosum.' days'));
        } else {
            $dari_tanggal = date("Y-m-d");
            $daystosum = '6';
            $sampai_tanggal = date('Y-m-d', strtotime($dari_tanggal.' + '.$daystosum.' days'));
        }

        if ($dari_tanggal && $sampai_tanggal && Input::has('search_kelas')) {
		 	return $this->absensi()->whereBetween('date', [$dari_tanggal, $sampai_tanggal])->where('status','S')->count();
        }

        return null;
	}
	// Jumlah Izin
	public function getIzinAttribute()
	{
	 	if (Input::has('dari_tanggal')) {
            $dari_tanggal = Input::get('dari_tanggal');
            $daystosum = '6';
            $sampai_tanggal = date('Y-m-d', strtotime($dari_tanggal.' + '.$daystosum.' days'));
        } else {
            $dari_tanggal = date("Y-m-d");
            $daystosum = '6';
            $sampai_tanggal = date('Y-m-d', strtotime($dari_tanggal.' + '.$daystosum.' days'));
        }

        if ($dari_tanggal && $sampai_tanggal && Input::has('search_kelas')) {
		 	return $this->absensi()->whereBetween('date', [$dari_tanggal, $sampai_tanggal])->where('status','I')->count();
        }
        
        return null;
	}
	// Jumlah Alpa
	public function getAlpaAttribute()
	{
	 	if (Input::has('dari_tanggal')) {
            $dari_tanggal = Input::get('dari_tanggal');
            $daystosum = '6';
            $sampai_tanggal = date('Y-m-d', strtotime($dari_tanggal.' + '.$daystosum.' days'));
        } else {
            $dari_tanggal = date("Y-m-d");
            $daystosum = '6';
            $sampai_tanggal = date('Y-m-d', strtotime($dari_tanggal.' + '.$daystosum.' days'));
        }

        if ($dari_tanggal && $sampai_tanggal && Input::has('search_kelas')) {
		 	return $this->absensi()->whereBetween('date', [$dari_tanggal, $sampai_tanggal])->where('status','A')->count();
        }
        
        return null;
	}

	//ini yang permanent
	// public function getAbsensiAttribute()
	// {
	//  	if (Input::has('tanggal')) {
 //            $tanggal = Input::get('tanggal');
 //        } else {
 //            $tanggal = date("Y-m-d");
 //        }

 //        if ($tanggal && Input::has('search_kelas')) {
	// 	 	return $this->absensi()->where('date', $tanggal)->first();
 //        }
 //        return null;
	// }
}
