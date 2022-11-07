<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function dashboard_admin()
    {
        return view('superadmin.dokumen');
    }
}
