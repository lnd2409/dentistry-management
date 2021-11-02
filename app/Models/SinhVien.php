<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SinhVien
 * 
 * @property int $sv_id
 * @property string $sv_ma
 * @property string $sv_ten
 * @property string $sv_namsinh
 * @property string $sv_email
 * @property int|null $l_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Lop|null $lop
 * @property Collection|MonHoc[] $mon_hocs
 *
 * @package App\Models
 */
class SinhVien extends Model
{
	protected $table = 'sinh_vien';
	protected $primaryKey = 'sv_id';

	protected $casts = [
		'l_id' => 'int'
	];

	protected $fillable = [
		'sv_ma',
		'sv_ten',
		'sv_namsinh',
		'sv_email',
		'l_id'
	];

	public function lop()
	{
		return $this->belongsTo(Lop::class, 'l_id');
	}

	public function mon_hocs()
	{
		return $this->belongsToMany(MonHoc::class, 'mon_hoc_sinh_vien', 'sv_id', 'mh_id')
					->withPivot('id', 'mhsv_diem_1', 'mhsv_diem_2', 'mhsv_diem_phuc_khao_1', 'mhsv_diem_phuc_khao_2', 'mhsv_diemtong', 'mhsv_diemchu', 'pk_id')
					->withTimestamps();
	}
}
