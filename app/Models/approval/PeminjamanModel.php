<?php

namespace App\Models\approval;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PeminjamanModel extends Model
{
    public function allData()
    {
        return DB::table('Peminjaman')
            ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'peminjaman.no_dokumen')
            ->leftJoin('users', 'users.id', '=', 'peminjaman.id')
            ->get();
    }

    public function getPeminjamanByDivisi($divisi)
    {
        return DB::table('Peminjaman')
            ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'peminjaman.no_dokumen')
            ->leftJoin('users', 'users.id', '=', 'peminjaman.id')
            ->where('id_peminjaman', '=', $divisi)
            ->get();
    }

    // public function getPeminjamanByDivisi($divisi)
    // {
    //     return DB::table('Peminjaman')
    //         ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'peminjaman.no_dokumen')
    //         ->leftJoin('users', 'users.id', '=', 'peminjaman.id')
    //         ->where('dokumen.id_departemen', '=', $divisi)
    //         ->get();
    // }

    public function add_peminjaman($update_dokumen, $update_peminjaman, $no_dokumen)
    {
        if (DB::table('dokumen')->where('no_dokumen', $no_dokumen)->update($update_dokumen) && DB::table('peminjaman')->where('no_dokumen', $no_dokumen)->insert($update_peminjaman)) {
            return true;
        } else {
            return false;
        }
    }
}
