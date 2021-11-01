<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HocKy
 * 
 * @property int $hk_id
 * @property string $hk_ten
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class HocKy extends Model
{
	protected $table = 'hoc_ky';
	protected $primaryKey = 'hk_id';

	protected $fillable = [
		'hk_ten'
	];
}
