<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phieukham
 * 
 * @property int $pk_ma
 * @property Carbon $pk_ngaykham
 * @property string $pk_ghichu
 * @property int $pk_trangthai
 * @property Carbon $pk_ngaytaikham
 * @property int $pt_ma
 * @property int $nv_ma
 * @property int $hsb_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Khachhang $khachhang
 * @property Nhanvien $nhanvien
 * @property Phieuthu $phieuthu
 * @property Collection|Dichvu[] $dichvus
 * @property Chitietthuoc $chitietthuoc
 * @property Collection|Phieuchidinh[] $phieuchidinhs
 *
 * @package App\Models
 */
class Phieukham extends Model
{
	protected $table = 'phieukham';
	protected $primaryKey = 'pk_ma';

	protected $casts = [
		'pk_trangthai' => 'int',
		'pt_ma' => 'int',
		'nv_ma' => 'int',
		'hsb_ma' => 'int'
	];

	protected $dates = [
		'pk_ngaykham',
		'pk_ngaytaikham'
	];

	protected $fillable = [
		'pk_ngaykham',
		'pk_ghichu',
		'pk_trangthai',
		'pk_ngaytaikham',
		'pt_ma',
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

	public function phieuthu()
	{
		return $this->belongsTo(Phieuthu::class, 'pt_ma');
	}

	public function dichvus()
	{
		return $this->belongsToMany(Dichvu::class, 'chitietphieukhamdichvu', 'pk_ma', 'dv_ma')
					->withTimestamps();
	}

	public function chitietthuoc()
	{
		return $this->hasOne(Chitietthuoc::class, 'pk_ma');
	}

	public function phieuchidinhs()
	{
		return $this->hasMany(Phieuchidinh::class, 'pk_ma');
	}
}
