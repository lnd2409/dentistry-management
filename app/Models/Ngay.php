<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ngay
 * 
 * @property int $ngay_ma
 * @property Carbon $ngay
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Dongium $dongium
 * @property Giadv $giadv
 * @property Lichtruc $lichtruc
 *
 * @package App\Models
 */
class Ngay extends Model
{
	protected $table = 'ngay';
	protected $primaryKey = 'ngay_ma';

	protected $dates = [
		'ngay'
	];

	protected $fillable = [
		'ngay_ma',
		'ngay'
	];	

	public function dongium()
	{
		return $this->hasOne(Dongium::class, 'ngay_ma');
	}

	public function giadv()
	{
		return $this->hasOne(Giadv::class, 'ngay_ma');
	}

	public function lichtruc()
	{
		return $this->hasOne(Lichtruc::class, 'ngay_ma');
	}
}
