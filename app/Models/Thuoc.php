<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Thuoc
 * 
 * @property int $t_ma
 * @property string $t_ten
 * @property string $t_hoachat
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Chitietthuoc $chitietthuoc
 *
 * @package App\Models
 */
class Thuoc extends Model
{
	protected $table = 'thuoc';
	protected $primaryKey = 't_ma';

	protected $fillable = [
		't_ma',
		't_ten',
		't_hoachat',
	];

	public function chitietthuoc()
	{
		return $this->hasOne(Chitietthuoc::class, 't_ma');
	}

	/**
	 * Get the gia that owns the Thuoc
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function gia()
	{
		return $this->belongsTo(Giathuoc::class, 't_ma','t_ma')->latest('gt_ngay');
	}
}
