<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lichtruc
 * 
 * @property string $lt_chamcong
 * @property int $ca_ma
 * @property int $nv_ma
 * @property int $ngay_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Ca $ca
 * @property Ngay $ngay
 * @property Nhanvien $nhanvien
 *
 * @package App\Models
 */
class Lichtruc extends Model
{
	protected $table = 'lichtruc';
	public $incrementing = false;

	protected $casts = [
		'ca_ma' => 'int',
		'nv_ma' => 'int',
		'ngay_ma' => 'int'
	];

	protected $fillable = [
		'lt_chamcong',
		'ca_ma',
		'nv_ma',
		'ngay_ma'
	];

	public function ca()
	{
		return $this->belongsTo(Ca::class, 'ca_ma');
	}

	public function ngay()
	{
		return $this->belongsTo(Ngay::class, 'ngay_ma');
	}

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'nv_ma');
	}
}
