<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietthuoc
 * 
 * @property int $ctt_ma
 * @property int $ctt_soluong
 * @property int $ctt_gia
 * @property int $pk_ma
 * @property int $thuoc_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Phieukham $phieukham
 * @property Thuoc $thuoc
 *
 * @package App\Models
 */
class Chitietthuoc extends Model
{
	protected $table = 'chitietthuoc';
	protected $primaryKey = 'ctt_ma';

	protected $casts = [
		'ctt_soluong' => 'int',
		'ctt_gia' => 'int',
		'pk_ma' => 'int',
		'thuoc_ma' => 'int'
	];

	protected $fillable = [
		'ctt_soluong',
		'ctt_gia',
		'pk_ma',
		'thuoc_ma'
	];

	public function phieukham()
	{
		return $this->belongsTo(Phieukham::class, 'pk_ma');
	}

	public function thuoc()
	{
		return $this->belongsTo(Thuoc::class, 'thuoc_ma');
	}
}
