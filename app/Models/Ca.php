<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ca
 * 
 * @property int $ca_ma
 * @property Carbon $ca_giobatdau
 * @property Carbon $ca_gioketthuc
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Lichtruc $lichtruc
 *
 * @package App\Models
 */
class Ca extends Model
{
	protected $table = 'ca';
	protected $primaryKey = 'ca_ma';

	protected $dates = [
		'ca_giobatdau',
		'ca_gioketthuc'
	];

	protected $fillable = [
		'ca_giobatdau',
		'ca_gioketthuc'
	];

	public function lichtruc()
	{
		return $this->hasOne(Lichtruc::class, 'ca_ma');
	}
}
