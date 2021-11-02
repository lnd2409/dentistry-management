<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Giathuoc
 * 
 * @property int $gt_ma
 * @property Carbon $gt_ngay
 * @property int $gt_gia
 * @property int $thuoc_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Thuoc $thuoc
 *
 * @package App\Models
 */
class Giathuoc extends Model
{
	protected $table = 'giathuoc';
	protected $primaryKey = 'gt_ma';

	protected $casts = [
		'gt_gia' => 'int',
		'thuoc_ma' => 'int'
	];

	protected $dates = [
		'gt_ngay'
	];

	protected $fillable = [
		'gt_ngay',
		'gt_gia',
		'thuoc_ma'
	];

	public function thuoc()
	{
		return $this->belongsTo(Thuoc::class, 'thuoc_ma');
	}
}
