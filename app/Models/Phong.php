<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phong
 * 
 * @property int $p_ma
 * @property string $p_ten
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Lichtruc[] $lichtrucs
 *
 * @package App\Models
 */
class Phong extends Model
{
	protected $table = 'phong';
	protected $primaryKey = 'p_ma';

	protected $fillable = [
		'p_ten'
	];

	public function lichtrucs()
	{
		return $this->hasMany(Lichtruc::class, 'p_ma');
	}
}
