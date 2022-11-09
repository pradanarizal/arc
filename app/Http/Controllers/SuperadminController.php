<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenModel;

class SuperadminController extends Controller
{
<<<<<<< Updated upstream
    public function dashboard_admin()
=======
    // public function dokumen()
    // {
    //     return view('superadmin.dokumen');
    // }
    public function __construct()
    {
        $this->Model = new DokumenModel();
    }

    public function dokumen()
>>>>>>> Stashed changes
    {
        $data = [
            'dokumen' => $this->Model->allData()
        ];
        return view('superadmin.dokumen', $data);
    }
}
