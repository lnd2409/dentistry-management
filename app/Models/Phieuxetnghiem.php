<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phieuxetnghiem
 * 
 * @property int $pxn_ma
 * @property Carbon $pxn_ngaylap
 * @property string $pxn_ghichu
 * @property string $pxn_ketqua
 * @property int $pk_ma
 * @property int $cls_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Canlamsan $canlamsan
 * @property Phieukham $phieukham
 *
 * @package App\Models
 */
class Phieuxetnghiem extends Model
{
	protected $table = 'phieuxetnghiem';
	protected $primaryKey = 'pxn_ma';

	protected $casts = [
		'pk_ma' => 'int',
		'cls_ma' => 'int'
	];

	protected $dates = [
		'pxn_ngaylap'
	];

	protected $fillable = [
		'pxn_ngaylap',
		'pxn_ghichu',
		'pxn_ketqua',
		'pk_ma',
		'cls_ma'
	];

	public function canlamsan()
	{
		return $this->belongsTo(Canlamsan::class, 'cls_ma');
	}

	public function phieukham()
	{
		return $this->belongsTo(Phieukham::class, 'pk_ma');
	}
}
