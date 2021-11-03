<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Canlamsan
 * 
 * @property int $cls_ma
 * @property string $cls_ten
 * @property string $cls_mota
 * @property int $lcls_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Loaicanlamsan $loaicanlamsan
 * @property Collection|Giadichvucanlamsan[] $giadichvucanlamsans
 * @property Collection|Phieuxetnghiem[] $phieuxetnghiems
 *
 * @package App\Models
 */
class Canlamsan extends Model
{
	protected $table = 'canlamsan';
	protected $primaryKey = 'cls_ma';

	protected $casts = [
		'lcls_ma' => 'int'
	];

	protected $fillable = [
		'cls_ten',
		'cls_mota',
		'lcls_ma'
	];

	public function loaicanlamsan()
	{
		return $this->belongsTo(Loaicanlamsan::class, 'lcls_ma');
	}

	public function giadichvucanlamsans()
	{
		return $this->hasMany(Giadichvucanlamsan::class, 'cls_ma');
	}

	public function phieuxetnghiems()
	{
		return $this->hasMany(Phieuxetnghiem::class, 'cls_ma');
	}

	public function dongia(){
		return $this->belongsTo(Giadichvucanlamsan::class, 'cls_ma','cls_ma')->latest('ngay_ma');
	}
}