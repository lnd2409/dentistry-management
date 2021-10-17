<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phieuchidinh
 * 
 * @property int $pcd_ma
 * @property Carbon $pcd_ngaylap
 * @property string $pcd_ketqua
 * @property string $pcd_ghichu
 * @property int $pk_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Phieukham $phieukham
 * @property Chitietphieuchitietcanlamsan $chitietphieuchitietcanlamsan
 *
 * @package App\Models
 */
class Phieuchidinh extends Model
{
	protected $table = 'phieuchidinh';
	protected $primaryKey = 'pcd_ma';

	protected $casts = [
		'pk_ma' => 'int'
	];

	protected $dates = [
		'pcd_ngaylap'
	];

	protected $fillable = [
		'pcd_ngaylap',
		'pcd_ketqua',
		'pcd_ghichu',
		'pk_ma'
	];

	public function phieukham()
	{
		return $this->belongsTo(Phieukham::class, 'pk_ma');
	}

	public function chitietphieuchitietcanlamsan()
	{
		return $this->hasOne(Chitietphieuchitietcanlamsan::class, 'pcd_ma');
	}
}
