<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dongium
 * 
 * @property float $dongia
 * @property int $cls_ma
 * @property int $ngay_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Canlamsan $canlamsan
 * @property Ngay $ngay
 *
 * @package App\Models
 */
class Dongium extends Model
{
	protected $table = 'dongia';
	public $incrementing = false;

	protected $casts = [
		'dongia' => 'float',
		'cls_ma' => 'int',
		'ngay_ma' => 'int'
	];

	protected $fillable = [
		'dongia',
		'cls_ma',
		'ngay_ma'
	];

	public function canlamsan()
	{
		return $this->belongsTo(Canlamsan::class, 'cls_ma');
	}

	public function ngay()
	{
		return $this->belongsTo(Ngay::class, 'ngay_ma');
	}
}
