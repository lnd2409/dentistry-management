<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Loaicanlamsan
 * 
 * @property int $lcls_ma
 * @property string $lcls_ten
 * @property string $lcls_mota
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Canlamsan[] $canlamsans
 *
 * @package App\Models
 */
class Loaicanlamsan extends Model
{
	protected $table = 'loaicanlamsan';
	protected $primaryKey = 'lcls_ma';

	protected $fillable = [
		'lcls_ten',
		'lcls_mota'
	];

	public function canlamsans()
	{
		return $this->hasMany(Canlamsan::class, 'lcls_ma');
	}
}
