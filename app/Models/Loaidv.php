<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Loaidv
 * 
 * @property int $ldv_ma
 * @property string $ldv_ten
 * @property string $ldv_mota
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Dichvu[] $dichvus
 *
 * @package App\Models
 */
class Loaidv extends Model
{
	protected $table = 'loaidv';
	protected $primaryKey = 'ldv_ma';

	protected $fillable = [
		'ldv_ma',
		'ldv_ten',
		'ldv_mota'
	];

	public function dichvus()
	{
		return $this->hasMany(Dichvu::class, 'ldv_ma');
	}
}
