<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phieuthu
 * 
 * @property int $pt_ma
 * @property Carbon $pt_ngaylap
 * @property float $pt_tongtien
 * @property int $nv_ma
 * @property int $pk_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Nhanvien $nhanvien
 * @property Phieukham $phieukham
 *
 * @package App\Models
 */
class Phieuthu extends Model
{
	protected $table = 'phieuthu';
	protected $primaryKey = 'pt_ma';

	protected $casts = [
		'pt_tongtien' => 'float',
		'nv_ma' => 'int',
		'pk_ma' => 'int'
	];

	protected $dates = [
		'pt_ngaylap'
	];

	protected $fillable = [
		'pt_ngaylap',
		'pt_tongtien',
		'nv_ma',
		'pk_ma'
	];

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'nv_ma');
	}

	public function phieukham()
	{
		return $this->belongsTo(Phieukham::class, 'pk_ma');
	}
}
