<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Thuoc
 * 
 * @property int $thuoc_ma
 * @property string $thuoc_ten
 * @property string $thuoc_hoachat
 * @property int $thuoc_soluong
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Chitietthuoc[] $chitietthuocs
 * @property Collection|Giathuoc[] $giathuocs
 *
 * @package App\Models
 */
class Thuoc extends Model
{
	protected $table = 'thuoc';
	protected $primaryKey = 'thuoc_ma';

	protected $casts = [
		'thuoc_soluong' => 'int'
	];

	protected $fillable = [
		'thuoc_ten',
		'thuoc_hoachat',
		'thuoc_soluong'
	];

	public function chitietthuocs()
	{
		return $this->hasMany(Chitietthuoc::class, 'thuoc_ma');
	}

	public function giathuocs()
	{
		return $this->hasMany(Giathuoc::class, 'thuoc_ma');
	}
}
