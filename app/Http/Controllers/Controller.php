<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\notif_sidebar;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, notif_sidebar;

    public function __construct()
    {
        $this->notif = $this->approval_pending();

        $this->ModelProfil = new User();
    }

    public function profil_pengguna()
    {
        return view('profil',$this->notif);
    }

    public function profil_user()
    {
        $data = [
            'profil' => $this->ModelProfil->profilUser()
        ];

        return view('profil', $data);
    }
}
