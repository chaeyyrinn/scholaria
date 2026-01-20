<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index() {
        $data = User::where('role', 'siswa')
        ->get();

        return view('admin.data-siswa.index', compact('data'));
    }
}
