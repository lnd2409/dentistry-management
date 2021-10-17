<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Giadv
 * 
 * @property int $dv_ma
 * @property int $ngay_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Dichvu $dichvu
 * @property Ngay $ngay
 *
 * @package App\Models
 */
class Giadv extends Model
{
	protected $table = 'giadv';
	public $incrementing = false;

	protected $casts = [
		'dv_ma' => 'int',
		'ngay_ma' => 'int'
	];

	protected $fillable = [
		'dv_ma',
		'ngay_ma'
	];

	public function dichvu()
	{
		return $this->belongsTo(Dichvu::class, 'dv_ma');
	}

	public function ngay()
	{
		return $this->belongsTo(Ngay::class, 'ngay_ma');
	}
}
