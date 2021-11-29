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
 * @property int $pk_trangthai
 * @property string $pk_ghichu
 * @property Carbon $pk_ngaytaikham
 * @property int $nv_ma
 * @property int $hsb_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Hosobenh $hosobenh
 * @property Nhanvien $nhanvien
 * @property Collection|Dichvu[] $dichvus
 * @property Collection|Chitietthuoc[] $chitietthuocs
 * @property Collection|Phieuthu[] $phieuthus
 * @property Collection|Phieuxetnghiem[] $phieuxetnghiems
 *
 * @package App\Models
 */
class Phieukham extends Model
{
	protected $table = 'phieukham';
	protected $primaryKey = 'pk_ma';

	protected $casts = [
		'pk_trangthai' => 'int',
		'nv_ma' => 'int',
		'hsb_ma' => 'int'
	];

	protected $dates = [
		'pk_ngaykham',
		'pk_ngaytaikham'
	];

	protected $fillable = [
		'pk_ngaykham',
		'pk_trangthai',
		'pk_ghichu',
		'pk_ngaytaikham',
		'nv_ma',
		'hsb_ma'
	];

	public function hosobenh()
	{
		return $this->belongsTo(Hosobenh::class, 'hsb_ma');
	}

	public function nhanvien()
	{
		return $this->belongsTo(Nhanvien::class, 'nv_ma');
	}

	public function dichvus()
	{
		return $this->belongsToMany(Dichvu::class, 'chitietphieukhamdichvu', 'pk_ma', 'dv_ma')
					->withPivot('ctpkdv_id')
					->withTimestamps();
	}

	public function chitietthuocs()
	{
		return $this->hasMany(Chitietthuoc::class, 'pk_ma');
	}

	public function phieuthus()
	{
		return $this->hasMany(Phieuthu::class, 'pk_ma');
	}

	public function phieuxetnghiems()
	{
		return $this->hasMany(Phieuxetnghiem::class, 'pk_ma');
	}
}
