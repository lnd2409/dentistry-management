<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MonHocQuanTri
 * 
 * @property int $qt_id
 * @property string $qt_ten
 * @property string $username
 * @property string $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class MonHocQuanTri extends Model
{
	protected $table = 'mon_hoc_quan_tri';
	protected $primaryKey = 'qt_id';

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'qt_ten',
		'username',
		'password'
	];
}
