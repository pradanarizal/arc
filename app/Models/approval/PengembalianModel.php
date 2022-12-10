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
        ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'pengembalian.no_dokumen')
        ->leftJoin('peminjaman', 'peminjaman.id_peminjaman', '=', 'pengembalian.id_peminjaman')
        ->leftJoin('users', 'users.id', '=', 'pengembalian.id')
        ->get();
    }

    public function getPengembalianByDivisi($divisi)
    {
        return DB::table('pengembalian')
            ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'pengembalian.no_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengembalian.id')
            ->where('dokumen.id_departemen', '=', $divisi)
            ->get();
    }
}
