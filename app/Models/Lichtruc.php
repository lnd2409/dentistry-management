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
 * @property int $lt_ma
 * @property int $ca_ma
 * @property int $p_ma
 * @property int $nv_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Ca $ca
 * @property Nhanvien $nhanvien
 * @property Phong $phong
 *
 * @package App\Models
 */
class Lichtruc extends Model
{
	protected $table = 'lichtruc';
	protected $primaryKey = 'lt_ma';

	protected $casts = [
		'ca_ma' => 'int',
		'nv_ma' => 'int',
		'ngay_ma'
	];

	protected $fillable = [
		'ca_ma',
		'nv_ma',
		'ngay_ma',
		'chamcong'
	];

	public function ca()
	{
		return $this->belongsTo(Ca::class, 'ca_ma');
	}

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'nv_ma');
	}

	/**
	 * Get the ngay that owns the Lichtruc
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function ngay()
	{
		return $this->belongsTo(Ngay::class, 'ngay_ma');
	}
}