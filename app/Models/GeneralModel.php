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

    // public function get_all_pending()
    // {
    //     return DB::table('dokumen')
    //         ->leftJoin('pengarsipan', 'pengarsipan.no_dokumen', '=', 'dokumen.no_dokumen')
    //         ->leftJoin('retensi', 'retensi.no_dokumen', '=', 'dokumen.no_dokumen')
    //         ->leftJoin('peminjaman', 'peminjaman.no_dokumen', '=', 'dokumen.no_dokumen')
    //         ->leftJoin('pengembalian', 'pengembalian.no_dokumen', '=', 'dokumen.no_dokumen')

    //         ->where('status_pengarsipan', '=', 'Pending')
    //         ->orWhere('status_retensi', '=', 'Pending')
    //         ->orWhere('status_peminjaman', '=', 'Pending')
    //         ->orWhere('status_pengembalian', '=', 'Pending')
    //         ->count();
    // }

    public function get_pengarsipan_pending()
    {
        return DB::table('pengarsipan')
            ->where('status_pengarsipan', '=', 'Pending')
            ->count();
    }

    public function get_retensi_pending()
    {
        return DB::table('retensi')
            ->where('status_retensi', '=', 'Pending')
            ->count();
    }

    public function get_peminjaman_pending()
    {
        return DB::table('peminjaman')
            ->where('status_peminjaman', '=', 'Pending')
            ->count();
    }

    public function get_pengembalian_pending()
    {
        return DB::table('pengembalian')
            ->where('status_pengembalian', '=', 'Pending')
            ->count();
    }


    public function get_pengarsipan_pending_admin($id)
    {
        return DB::table('pengarsipan')
            ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
            ->where('status_pengarsipan', '=', 'Pending')
            ->where('users.id', '=', $id)
            ->count();
    }

    public function get_retensi_pending_admin($id)
    {
        return DB::table('retensi')
            ->leftJoin('users', 'users.id', '=', 'retensi.id')
            ->where('status_retensi', '=', 'Pending')
            ->where('users.id', '=', $id)
            ->count();
    }

    public function get_peminjaman_pending_admin($id)
    {
        return DB::table('peminjaman')
            ->leftJoin('users', 'users.id', '=', 'peminjaman.id')
            ->where('status_peminjaman', '=', 'Pending')
            ->where('users.id', '=', $id)
            ->count();
    }

    public function get_pengembalian_pending_admin($id)
    {
        return DB::table('pengembalian')
            ->leftJoin('users', 'users.id', '=', 'pengembalian.id')
            ->where('status_pengembalian', '=', 'Pending')
            ->where('users.id', '=', $id)
            ->count();
    }
}
