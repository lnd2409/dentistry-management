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
 * @property float $ctt_soluong
 * @property float $ctt_dongia
 * @property int $t_ma
 * @property int $pk_ma
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
	public $incrementing = false;

	protected $casts = [
		'ctt_soluong' => 'float',
		'ctt_dongia' => 'float',
		't_ma' => 'int',
		'pk_ma' => 'int'
	];

	protected $fillable = [
		'ctt_soluong',
		'ctt_dongia',
		't_ma',
		'pk_ma'
	];

	public function phieukham()
	{
		return $this->belongsTo(Phieukham::class, 'pk_ma');
	}

	public function thuoc()
	{
		return $this->belongsTo(Thuoc::class, 't_ma');
	}
}
