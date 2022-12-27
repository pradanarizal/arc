<?php

namespace App\Models\approval;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengarsipanModel extends Model
{
    public function allData($keyword)
    {        
        return DB::table('pengarsipan')
            ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'pengarsipan.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
            // ->where('status_dokumen', '=', 'Pengarsipan')
            ->where('dokumen.nama_dokumen', 'like', '%'.$keyword.'%')
            ->orwhere('dokumen.no_dokumen', 'like', '%'.$keyword.'%')
            ->orwhere('dokumen.tahun_dokumen', 'like', '%'.$keyword.'%')
            ->orwhere('dokumen.deskripsi', 'like', '%'.$keyword.'%')
            ->orwhere('dokumen.nama_kel_dokumen', 'like', '%'.$keyword.'%')
            ->paginate(20);
    }

    public function get_lokasi_dokumen($id_ruang)
    {
        $a = DB::table('rak')
            ->where('id_ruang', $id_ruang)
            ->get();
            
        $b = DB::table('box')
            ->where('id_ruang', $id_ruang)
            ->get();
        $c = DB::table('map')
            ->where('id_ruang', $id_ruang)
            ->get();
        return [$a, $b, $c];
    }

    public function approval_arsip($update_dokumen, $update_pengarsipan, $no_dokumen)
    {
        if (DB::table('dokumen')->where('id_dokumen', $no_dokumen)->update($update_dokumen) && DB::table('pengarsipan')->where('id_dokumen', $no_dokumen)->update($update_pengarsipan)) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataById($id)
    {
        return DB::table('pengarsipan')
            ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'pengarsipan.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
            ->where('id_pengarsipan', '=', $id)
            ->get();
    }

    public function getDataByDivisi($divisi)
    {
        return DB::table('pengarsipan')
            ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'pengarsipan.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
            ->where('dokumen.id_departemen', '=', $divisi)
            ->get();
    }

    public function getRuang()
    {
        return DB::table('ruang')
            ->get();
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
}
