<?php

namespace App\Models\approval;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengembalianModel extends Model
{
    public function allData()
    {
        return DB::table('pengembalian')
        ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'pengembalian.id_dokumen')
        ->leftJoin('peminjaman', 'peminjaman.id_peminjaman', '=', 'pengembalian.id_peminjaman')
        ->leftJoin('users', 'users.id', '=', 'pengembalian.id')
        ->get();
    }

    public function approval_pengembalian($update_pengembalian, $id_pengembalian)
    {
        if(DB::table('pengembalian')->where('id_pengembalian', $id_pengembalian)->update($update_pengembalian)) {
            return true;
        } else {
            return false;
        }
    }
    public function getDataById($id)
    {
        return DB::table('pengembalian')
            ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'pengembalian.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengembalian.id')
            ->where('id_pengembalian', '=', $id)
            ->get();
    }

    public function getPengembalianByDivisi($id_user)
    {
        return DB::table('pengembalian')
            ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'pengembalian.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengembalian.id')
            // ->where('dokumen.id_departemen', '=', $divisi)
            ->where('users.id', '=', $id_user)
            ->get();
    }
}
