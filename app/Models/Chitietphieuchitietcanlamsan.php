<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chitietphieuchitietcanlamsan
 * 
 * @property int $pcd_ma
 * @property int $cls_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Canlamsan $canlamsan
 * @property Phieuchidinh $phieuchidinh
 *
 * @package App\Models
 */
class Chitietphieuchitietcanlamsan extends Model
{
	protected $table = 'chitietphieuchitietcanlamsan';
	public $incrementing = false;

	protected $casts = [
		'pcd_ma' => 'int',
		'cls_ma' => 'int'
	];

	protected $fillable = [
		'pcd_ma',
		'cls_ma'
	];

	public function canlamsan()
	{
		return $this->belongsTo(Canlamsan::class, 'cls_ma');
	}

	public function phieuchidinh()
	{
		return $this->belongsTo(Phieuchidinh::class, 'pcd_ma');
	}
}
