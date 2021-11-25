<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Giadichvucanlamsan
 * 
 * @property int $gdvcls_id
 * @property int $ngay_ma
 * @property int $cls_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Canlamsan $canlamsan
 * @property Ngay $ngay
 *
 * @package App\Models
 */
class Giadichvu extends Model
{
	protected $table = 'giadichvu';
	protected $primaryKey = 'gdv_id';

	protected $casts = [
		'ngay_ma' => 'int',
		'dv_ma' => 'int'
	];

	protected $fillable = [
		'ngay_ma',
		'dv_ma',
		'gdv_gia'
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