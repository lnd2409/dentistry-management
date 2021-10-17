<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Giathuoc extends Model
{
	protected $table = 'giathuoc';
	protected $primaryKey = 'gt_ngay';
	public $timestamps = false;
	protected $fillable = [
		't_ma',
		'gt_ngay',
		'gt_gia'
	];


}
