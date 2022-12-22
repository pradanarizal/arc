<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\notif_sidebar;
use App\Models\User;
use App\Models\GeneralModel;
use Illuminate\Support\Facades\Auth;

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
        $data = [
            'profil' => $this->ModelProfil->profilUser(),

            //notif sidebar - admin
            'count_pengarsipan_pending_admin' => $this->model->get_pengarsipan_pending_admin(Auth::user()->id_departemen),
            'count_retensi_pending_admin' => $this->model->get_retensi_pending_admin(Auth::user()->id_departemen),
            'count_peminjaman_pending_admin' => $this->model->get_peminjaman_pending_admin(Auth::user()->id_departemen),
            'count_pengembalian_pending_admin' => $this->model->get_pengembalian_pending_admin(Auth::user()->id_departemen),
        ];

        return view('profil', $data, $this->notif);
    }

    public function notif_pending()
    {
        $this->model = new GeneralModel();

        $data = [
            //notif sidebar - super admin
            'count_pengarsipan_pending' => $this->model->get_pengarsipan_pending(),
            'count_retensi_pending' => $this->model->get_retensi_pending(),
            'count_peminjaman_pending' => $this->model->get_peminjaman_pending(),
            'count_pengembalian_pending' => $this->model->get_pengembalian_pending(),

            //notif sidebar - admin
            'count_pengarsipan_pending_admin' => $this->model->get_pengarsipan_pending_admin(Auth::user()->id_departemen),
            'count_retensi_pending_admin' => $this->model->get_retensi_pending_admin(Auth::user()->id_departemen),
            'count_peminjaman_pending_admin' => $this->model->get_peminjaman_pending_admin(Auth::user()->id_departemen),
            'count_pengembalian_pending_admin' => $this->model->get_pengembalian_pending_admin(Auth::user()->id_departemen),
        ];
        return $data;
    }
}
