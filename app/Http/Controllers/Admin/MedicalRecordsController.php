<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoSoBenh;
class MedicalRecordsController extends Controller
{
    public function index(Request $request) {
        $hoSoBenh = HoSoBenh::all();
        return view('admin.medical_records.index', compact('hoSoBenh'));
    }

    
}
