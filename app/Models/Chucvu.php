<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chucvu
 * 
 * @property int $cv_ma
 * @property string $cv_ten
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Chucvu extends Model
{
	protected $table = 'chucvu';
	protected $primaryKey = 'cv_ma';

	protected $fillable = [
		'cv_ten'
	];
}
