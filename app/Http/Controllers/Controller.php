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
        $data = [
            'count_all_pending' => $this->model->get_all_pending(),
            'count_pengarsipan_pending' => $this->model->get_pengarsipan_pending(),
            'count_retensi_pending' => $this->model->get_retensi_pending(),
        ];
        return view('profil',$data);
    }
}
