<?php

namespace App\Http\Controllers\user;

use App\Models\DokumenModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->Model = new DokumenModel();
    }

    public function index()
    {
        $data = [
            'dokumen' => $this->Model->allData(),
        ];
        return view('user.dokumen', $data);
    }

    public function detail_data($id)
    {

        $data = [
            'dokumen' => $this->Model->getDokumenById($id)
        ];
        return view('user.detail_dokumen_user', $data);
    }

    public function showPdfUser($nomorDokumen)
    {
        return Response::make(file_get_contents('data_file/pengarsipan/'.$nomorDokumen.'.pdf'), 200, [
            'content-type'=>'application/pdf',
        ]);
    }



}
