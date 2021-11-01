<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PhucKhao
 * 
 * @property int $pk_id
 * @property string $pk_noidung
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|MonHocSinhVien[] $mon_hoc_sinh_viens
 *
 * @package App\Models
 */
class PhucKhao extends Model
{
	protected $table = 'phuc_khao';
	protected $primaryKey = 'pk_id';

	protected $fillable = [
		'pk_noidung'
	];

	public function mon_hoc_sinh_viens()
	{
		return $this->hasMany(MonHocSinhVien::class, 'pk_id');
	}
}
