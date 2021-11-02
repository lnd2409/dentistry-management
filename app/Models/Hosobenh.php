<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hosobenh
 * 
 * @property int $hsb_ma
 * @property Carbon $hsb_ngaylap
 * @property string $hsb_hotenkhachhang
 * @property string $hsb_sdt
 * @property string $hsb_diachi
 * @property string $hsb_namsinh
 * @property string $hsb_gioitinh
 * @property string|null $hsb_cmnd
 * @property int|null $nv_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Nhanvien|null $nhanvien
 * @property Collection|Phieukham[] $phieukhams
 *
 * @package App\Models
 */
class Hosobenh extends Model
{
	protected $table = 'hosobenh';
	protected $primaryKey = 'hsb_ma';

	protected $casts = [
		'nv_ma' => 'int'
	];

	protected $dates = [
		'hsb_ngaylap'
	];

	protected $fillable = [
		'hsb_ngaylap',
		'hsb_hotenkhachhang',
		'hsb_sdt',
		'hsb_diachi',
		'hsb_namsinh',
		'hsb_gioitinh',
		'hsb_cmnd',
		'nv_ma'
	];

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'nv_ma');
	}

	public function phieukhams()
	{
		return $this->hasMany(Phieukham::class, 'hsb_ma');
	}
}
