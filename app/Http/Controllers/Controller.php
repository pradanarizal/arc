<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\notif_sidebar;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, notif_sidebar;

    public function __construct()
    {
        $this->notif = $this->approval_pending();
    }

    public function profil_pengguna()
    {
        return view('profil',$this->notif);
    }
}
