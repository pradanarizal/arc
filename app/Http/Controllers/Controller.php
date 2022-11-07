<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\GeneralModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->model = new GeneralModel();
    }

    public function profil_pengguna()
    {
        // $data = [
        //     'data_profil' => $this->model->get_profil()
        // ];
        //    return view('profil',$data);
        return view('profil');
    }
}
