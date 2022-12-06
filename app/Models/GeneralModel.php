<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GeneralModel extends Model
{
    use HasFactory;

    public function get_profil()
    {
        return DB::table('users')->select('id', 'nama_trainset')->get();
    }

    public function get_all_pending()
    {
        return DB::table('dokumen')
            ->where('status_dokumen', '=', 'Pending')
            ->orWhere('status_dokumen', '=', 'Pengarsipan')
            ->count();
    }

    public function get_pengarsipan_pending() {
        return DB::table('dokumen')
            ->where('status_dokumen', '=', 'Pengarsipan')
            ->count();
    }

    public function get_retensi_pending() {
        return DB::table('dokumen')
            ->where('status_dokumen', '=', 'Pending')
            ->count();
    }
}
