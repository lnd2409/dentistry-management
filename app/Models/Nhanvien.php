<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Nhanvien
 * 
 * @property int $nv_ma
 * @property string $nv_hoten
 * @property string|null $nv_sdt
 * @property string|null $nv_namsinh
 * @property string|null $nv_diachi
 * @property string|null $nv_gioitinh
 * @property string $username
 * @property string $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Lichtruc $lichtruc
 * @property Collection|Phieuhen[] $phieuhens
 * @property Collection|Phieukham[] $phieukhams
 * @property Collection|Phieuthu[] $phieuthus
 *
 * @package App\Models
 */
class Nhanvien extends Authenticatable
{
	protected $table = 'nhanvien';
	protected $primaryKey = 'nv_ma';

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nv_hoten',
		'nv_sdt',
		'nv_namsinh',
		'nv_diachi',
		'nv_gioitinh',
		'username',
		'password'
	];

	// public function lichtruc()
	// {
	// 	return $this->hasOne(Lichtruc::class, 'nv_ma');
	// }

	// public function phieuhens()
	// {
	// 	return $this->hasMany(Phieuhen::class, 'nv_ma');
	// }

	// public function phieukhams()
	// {
	// 	return $this->hasMany(Phieukham::class, 'nv_ma');
	// }

	// public function phieuthus()
	// {
	// 	return $this->hasMany(Phieuthu::class, 'nv_ma');
	// }
}
