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
 * @property string $dv_tgdukien
 * @property int $ldv_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Loaidv $loaidv
 * @property Collection|Phieukham[] $phieukhams
 * @property Giadv $giadv
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
		'dv_tgdukien',
		'ldv_ma'
	];

	public function loaidv()
	{
		return $this->belongsTo(Loaidv::class, 'ldv_ma');
	}

	public function phieukhams()
	{
		return $this->belongsToMany(Phieukham::class, 'chitietphieukhamdichvu', 'dv_ma', 'pk_ma')
					->withTimestamps();
	}

	public function giadv()
	{
		return $this->hasOne(Giadv::class, 'dv_ma');
	}
}
