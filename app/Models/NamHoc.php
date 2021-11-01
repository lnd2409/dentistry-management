<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NamHoc
 * 
 * @property int $nh_id
 * @property string $nh_ten
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class NamHoc extends Model
{
	protected $table = 'nam_hoc';
	protected $primaryKey = 'nh_id';

	protected $fillable = [
		'nh_ten'
	];
}
