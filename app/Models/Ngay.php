<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ngay
 * 
 * @property int $ngay_ma
 * @property Carbon $ngay
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Giadichvucanlamsan[] $giadichvucanlamsans
 *
 * @package App\Models
 */
class Ngay extends Model
{
	protected $table = 'ngay';
	protected $primaryKey = 'ngay_ma';

	protected $dates = [
		'ngay'
	];

	protected $fillable = [
		'ngay'
	];

	public function giadichvucanlamsans()
	{
		return $this->hasMany(Giadichvucanlamsan::class, 'ngay_ma');
	}
}
