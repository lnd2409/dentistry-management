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
class Giadichvucanlamsan extends Model
{
	protected $table = 'giadichvucanlamsan';
	protected $primaryKey = 'gdvcls_id';

	protected $casts = [
		'ngay_ma' => 'int',
		'cls_ma' => 'int'
	];

	protected $fillable = [
		'ngay_ma',
		'cls_ma'
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
