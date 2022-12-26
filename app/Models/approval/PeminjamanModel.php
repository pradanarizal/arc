<?php

namespace App\Models\approval;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PeminjamanModel extends Model
{
    public function allData($keyword)
    {
        return DB::table('Peminjaman')
            ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'peminjaman.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'peminjaman.id')
            ->where('dokumen.no_dokumen', 'like', '%'.$keyword.'%')
            ->orwhere('dokumen.nama_dokumen', 'like', '%'.$keyword.'%')
            ->orwhere('dokumen.tahun_dokumen', 'like', '%'.$keyword.'%')
            ->orwhere('dokumen.deskripsi', 'like', '%'.$keyword.'%')
            ->orwhere('dokumen.nama_kel_dokumen', 'like', '%'.$keyword.'%')
            ->paginate(20);
    }

    public function approval_peminjaman($update_peminjaman, $id_peminjaman)
    {
        if (DB::table('peminjaman')->where('id_peminjaman', $id_peminjaman)->update($update_peminjaman)) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataById($id)
    {
        return DB::table('peminjaman')
            ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'peminjaman.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'peminjaman.id')
            ->where('id_peminjaman', '=', $id)
            ->get();
    }

    public function getPeminjamanByDivisi($id_user)
    {
        // return DB::table('Peminjaman')
        //     ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'peminjaman.id_dokumen')
        //     ->leftJoin('users', 'users.id', '=', 'peminjaman.id')
        //     ->where('dokumen.id_departemen', '=', $divisi)
        //     ->get();
        return DB::table('peminjaman')
        ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'peminjaman.id_dokumen')
        ->leftJoin('users', 'users.id', '=', 'peminjaman.id')
        ->where('users.id', '=', $id_user)
        ->paginate(20);
    }

    public function getPengembalian()
    {
        return DB::table('pengembalian')
            ->get();
    }
}
