<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MonHocSinhVien
 * 
 * @property int $id
 * @property int $mhsv_diem_1
 * @property int $mhsv_diem_2
 * @property int $mhsv_diem_phuc_khao_1
 * @property int $mhsv_diem_phuc_khao_2
 * @property int $mhsv_diemtong
 * @property string $mhsv_diemchu
 * @property int|null $sv_id
 * @property int|null $pk_id
 * @property int|null $mh_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property MonHoc|null $mon_hoc
 * @property PhucKhao|null $phuc_khao
 * @property SinhVien|null $sinh_vien
 *
 * @package App\Models
 */
class MonHocSinhVien extends Model
{
	protected $table = 'mon_hoc_sinh_vien';

	protected $casts = [
		'mhsv_diem_1' => 'int',
		'mhsv_diem_2' => 'int',
		'mhsv_diem_phuc_khao_1' => 'int',
		'mhsv_diem_phuc_khao_2' => 'int',
		'mhsv_diemtong' => 'int',
		'sv_id' => 'int',
		'pk_id' => 'int',
		'mh_id' => 'int'
	];

	protected $fillable = [
		'mhsv_diem_1',
		'mhsv_diem_2',
		'mhsv_diem_phuc_khao_1',
		'mhsv_diem_phuc_khao_2',
		'mhsv_diemtong',
		'mhsv_diemchu',
		'sv_id',
		'pk_id',
		'mh_id'
	];

	public function mon_hoc()
	{
		return $this->belongsTo(MonHoc::class, 'mh_id');
	}

	public function phuc_khao()
	{
		return $this->belongsTo(PhucKhao::class, 'pk_id');
	}

	public function sinh_vien()
	{
		return $this->belongsTo(SinhVien::class, 'sv_id');
	}
}
