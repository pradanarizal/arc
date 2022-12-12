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
}
