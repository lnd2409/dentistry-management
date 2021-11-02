<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MonHoc
 * 
 * @property int $mh_id
 * @property string $mh_ma
 * @property string $mh_ten
 * @property int|null $gv_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property GiaoVien|null $giao_vien
 * @property Collection|SinhVien[] $sinh_viens
 *
 * @package App\Models
 */
class MonHoc extends Model
{
	protected $table = 'mon_hoc';
	protected $primaryKey = 'mh_id';

	protected $casts = [
		'gv_id' => 'int'
	];

	protected $fillable = [
		'mh_ma',
		'mh_ten',
		'gv_id'
	];

	public function giao_vien()
	{
		return $this->belongsTo(GiaoVien::class, 'gv_id');
	}

	public function sinh_viens()
	{
		return $this->belongsToMany(SinhVien::class, 'mon_hoc_sinh_vien', 'mh_id', 'sv_id')
					->withPivot('id', 'mhsv_diem_1', 'mhsv_diem_2', 'mhsv_diem_phuc_khao_1', 'mhsv_diem_phuc_khao_2', 'mhsv_diemtong', 'mhsv_diemchu', 'pk_id')
					->withTimestamps();
	}
}
