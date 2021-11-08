<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Dichvu
 * 
 * @property int $dv_ma
 * @property string $dv_ten
 * @property string $dv_mota
 * @property string $dv_thoigiandukien
 * @property int $ldv_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Loaidichvu $loaidichvu
 * @property Collection|Phieukham[] $phieukhams
 *
 * @package App\Models
 */
class Dichvu extends Model
{
	protected $table = 'dichvu';
	protected $primaryKey = 'dv_ma';

	protected $casts = [
		'ldv_ma' => 'int'
	];

	protected $fillable = [
		'dv_ten',
		'dv_mota',
		'dv_thoigiandukien',
		'ldv_ma'
	];

	public function loaidichvu()
	{
		return $this->belongsTo(Loaidichvu::class, 'ldv_ma');
	}

	public function phieukhams()
	{
		return $this->belongsToMany(Phieukham::class, 'chitietphieukhamdichvu', 'dv_ma', 'pk_ma')
					->withPivot('ctpkdv_id')
					->withTimestamps();
	}

	public function giadv()
	{
		return $this->belongsTo(Giadichvu::class, 'dv_ma','dv_ma')->latest('ngay_ma');
	}
}