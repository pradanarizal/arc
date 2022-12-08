<?php

namespace App\Http\Controllers\admin\riwayat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\approval\PengarsipanModel;
use Auth;

class RiwayatpengarsipanController extends Controller
{
    public function __construct()
    {
        $this->Model = new PengarsipanModel();
    }

    public function index()
    {
        $data = [
            'dokumen' => $this->Model->getDataByDivisi(Auth::user()->divisi),
        ];

        return view('admin.riwayat.riwayat-pengarsipan', $data);
    }

    public function show_detail($id)
    {
        $data = [
            'pengarsipan' => $this->Model->getDataById($id),
        ];

        return view('admin.riwayat.d_riwayat_pengarsipan', $data);
    }
    
}
