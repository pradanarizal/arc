<?php

namespace App\Models\approval;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengarsipanModel extends Model
{
    public function allData()
    {
        return DB::table('pengarsipan')
            ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'pengarsipan.no_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
            // ->where('status_dokumen', '=', 'Pengarsipan')
            ->get();
    }

    public function approval_arsip($update_dokumen, $update_pengarsipan, $no_dokumen)
    {
        if (DB::table('dokumen')->where('no_dokumen', $no_dokumen)->update($update_dokumen) && DB::table('pengarsipan')->where('no_dokumen', $no_dokumen)->update($update_pengarsipan)) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataById($id)
    {
        return DB::table('pengarsipan')
            ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'pengarsipan.no_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
            ->where('id_pengarsipan', '=', $id)
            ->get();
    }

    public function getPengarsipanByDivisi($divisi)
    {
        return DB::table('pengarsipan')
            ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'pengarsipan.no_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
            ->where('dokumen.id_departemen', '=', $divisi)
            ->get();
    }
    public function getRuang()
    {
        return DB::table('ruang')->select('id_ruang', 'nama_ruang')->get();
    }
    public function getRak()
    {
        return DB::table('rak')->select('id_rak', 'nama_rak')->get();
    }
    public function getBox()
    {
        return DB::table('box')->select('id_box', 'nama_box')->get();
    }
    public function getMap()
    {
        return DB::table('map')->select('id_map', 'nama_map')->get();
    }

    // public function getDataById($id)
    // {
    //     return DB::table('pengarsipan')
    //         ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'pengarsipan.no_dokumen')
    //         ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
    //         ->where('id_pengarsipan', '=', $id)
    //         ->get();
    // }

    public function getDataByDivisi($divisi)
    {
        return DB::table('pengarsipan')
            ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'pengarsipan.no_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
            ->where('dokumen.id_departemen', '=', $divisi)
            ->get();
    }

}
