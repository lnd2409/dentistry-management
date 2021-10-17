<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
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
 * @property Loaicl $loaicl
 * @property Chitietphieuchitietcanlamsan $chitietphieuchitietcanlamsan
 * @property Dongium $dongium
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

	public function loaicl()
	{
		return $this->belongsTo(Loaicl::class, 'lcls_ma');
	}

	public function chitietphieuchitietcanlamsan()
	{
		return $this->hasOne(Chitietphieuchitietcanlamsan::class, 'cls_ma');
	}

	public function dongium()
	{
		return $this->hasOne(Dongium::class, 'cls_ma');
	}
}
