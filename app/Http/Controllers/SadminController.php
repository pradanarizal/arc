<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SadminController extends Controller
{
    public function dokumen()
    {
        return view('user.dokumen');
    }
}
