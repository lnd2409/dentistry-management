<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KhachHang extends Authenticatable
{
    use HasFactory;
     protected $table = 'khachhang';
     protected $primaryKey = 'hsb_ma';
     protected $fillable =
     [
        'hsb_ma',
        'hsb_hoten',
        'hsb_sdt',
        'hsb_namsinh',
        'hsb_diachi',
        'hsb_gioitinh',
        'username',
        'password'
     ];
     protected $hidden = ['password'];
}
