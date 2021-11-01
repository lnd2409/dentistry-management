<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GiaoVien
 * 
 * @property int $gv_id
 * @property string $gv_ten
 * @property string $gv_email
 * @property string $gv_sdt
 * @property string $username
 * @property string $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|MonHoc[] $mon_hocs
 *
 * @package App\Models
 */
class GiaoVien extends Model
{
	protected $table = 'giao_vien';
	protected $primaryKey = 'gv_id';

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'gv_ten',
		'gv_email',
		'gv_sdt',
		'username',
		'password'
	];

	public function mon_hocs()
	{
		return $this->hasMany(MonHoc::class, 'gv_id');
	}
}
