<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Nhanvien
 * 
 * @property int $nv_ma
 * @property string $nv_ten
 * @property string|null $nv_gioitinh
 * @property string|null $nv_diachi
 * @property string|null $nv_cmnd
 * @property string|null $nv_sdt
 * @property string $username
 * @property string $password
 * @property int $cm_ma
 * @property int $cv_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Chuyenmon $chuyenmon
 * @property Chucvu $chucvu
 * @property Collection|Hosobenh[] $hosobenhs
 * @property Collection|Lichtruc[] $lichtrucs
 * @property Collection|Phieuhen[] $phieuhens
 * @property Collection|Phieukham[] $phieukhams
 * @property Collection|Phieuthu[] $phieuthus
 *
 * @package App\Models
 */
class Nhanvien extends Model
{
	protected $table = 'nhanvien';
	protected $primaryKey = 'nv_ma';

	protected $casts = [
		'cm_ma' => 'int',
		'cv_ma' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nv_ten',
		'nv_gioitinh',
		'nv_diachi',
		'nv_cmnd',
		'nv_sdt',
		'username',
		'password',
		'cm_ma',
		'cv_ma'
	];

	public function chuyenmon()
	{
		return $this->belongsTo(Chuyenmon::class, 'cm_ma');
	}

	public function chucvu()
	{
		return $this->belongsTo(Chucvu::class, 'cv_ma');
	}

	public function hosobenhs()
	{
		return $this->hasMany(Hosobenh::class, 'nv_ma');
	}

	public function lichtrucs()
	{
		return $this->hasMany(Lichtruc::class, 'nv_ma');
	}

	public function phieuhens()
	{
		return $this->hasMany(Phieuhen::class, 'nv_ma');
	}

	public function phieukhams()
	{
		return $this->hasMany(Phieukham::class, 'nv_ma');
	}

	public function phieuthus()
	{
		return $this->hasMany(Phieuthu::class, 'nv_ma');
	}
}