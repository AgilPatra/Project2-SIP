<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin/dashboard');
    }

    public function anggota_dashboard()
    {
        return view('anggota/dashboard');
    }
}
