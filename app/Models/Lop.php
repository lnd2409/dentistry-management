<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lop
 * 
 * @property int $l_id
 * @property string $l_ma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|SinhVien[] $sinh_viens
 *
 * @package App\Models
 */
class Lop extends Model
{
	protected $table = 'lop';
	protected $primaryKey = 'l_id';

	protected $fillable = [
		'l_ma'
	];

	public function sinh_viens()
	{
		return $this->hasMany(SinhVien::class, 'l_id');
	}
}
