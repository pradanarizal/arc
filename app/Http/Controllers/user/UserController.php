<?php

namespace App\Http\Controllers\user;

use App\Models\DokumenModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('user.detail_dokumen', $data);
    }

}
