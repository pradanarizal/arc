<?php

namespace App\Http\Controllers\user;

use App\Models\DokumenModel;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->Model = new DokumenModel();
    }

    public function index()
    {
        $data = [
            'dokumen' => $this->Model->getDokumenByDivisi(Auth::user()->id_departemen),
        ];
        return view('user.dokumen_terbatas_user', $data);
    }

    public function dokumen_terbuka()
    {
        $data = [
            'dokumen' => $this->Model->allDataTerbuka(),
        ];
        return view('user.dokumen_terbuka_user', $data);
    }

    public function detail_data($id)
    {

        $data = [
            'dokumen' => $this->Model->getDokumenById($id),
            'peminjaman'    => $this->Model->getNamaPeminjam($id)

        ];
        return view('user.detail_dokumen_user', $data);
    }

    public function showPdfUser($namePDF)
    {
        return Response::make(file_get_contents('data_file/'.$namePDF.'.pdf'), 200, [
            'content-type'=>'application/pdf',
        ]);
    }



}
