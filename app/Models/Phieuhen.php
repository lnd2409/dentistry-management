<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phieuhen
 * 
 * @property int $ph_ma
 * @property Carbon $ph_ngayhen
 * @property Carbon $ph_giohen
 * @property string $ph_yeucau
 * @property string $ph_trangthai
 * @property int $nv_ma
 * @property int $hsb_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Khachhang $khachhang
 * @property Nhanvien $nhanvien
 *
 * @package App\Models
 */
class Phieuhen extends Model
{
	protected $table = 'phieuhen';
	protected $primaryKey = 'ph_ma';

	protected $casts = [
		'nv_ma' => 'int',
		'hsb_ma' => 'int'
	];

	protected $dates = [
		'ph_ngayhen',
		'ph_giohen'
	];

	protected $fillable = [
		'ph_ngayhen',
		'ph_giohen',
		'ph_yeucau',
		'ph_trangthai',
		'nv_ma',
		'hsb_ma'
	];

	public function khachhang()
	{
		return $this->belongsTo(Khachhang::class, 'hsb_ma');
	}

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'nv_ma');
	}
}
