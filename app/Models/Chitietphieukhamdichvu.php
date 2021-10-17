<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietphieukhamdichvu
 * 
 * @property int $dv_ma
 * @property int $pk_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Dichvu $dichvu
 * @property Phieukham $phieukham
 *
 * @package App\Models
 */
class Chitietphieukhamdichvu extends Model
{
	protected $table = 'chitietphieukhamdichvu';
	public $incrementing = false;

	protected $casts = [
		'dv_ma' => 'int',
		'pk_ma' => 'int'
	];

	protected $fillable = [
		'dv_ma',
		'pk_ma'
	];

	public function dichvu()
	{
		return $this->belongsTo(Dichvu::class, 'dv_ma');
	}

	public function phieukham()
	{
		return $this->belongsTo(Phieukham::class, 'pk_ma');
	}
}
