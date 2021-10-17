<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chuyenmon
 * 
 * @property int $cm_ma
 * @property string $cm_ten
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Chuyenmon extends Model
{
	protected $table = 'chuyenmon';
	protected $primaryKey = 'cm_ma';

	protected $fillable = [
		'cm_ten'
	];
}
