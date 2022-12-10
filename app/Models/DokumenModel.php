<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DokumenModel extends Model
{
    //Tampilan Data Dokumen (tersedia, dipinjam)
    //Integrasi from table ruang, rak, box, map, kelengkapan_dokumen
    public function allData()
    {
        return DB::table('dokumen')
            ->where('status_dokumen', '=', 'Tersedia')
            ->orwhere('status_dokumen', '=', 'Dipinjam')
            ->leftJoin('ruang', 'ruang.id_ruang', '=', 'dokumen.id_ruang')
            ->leftJoin('rak', 'rak.id_rak', '=', 'dokumen.id_rak')
            ->leftJoin('box', 'box.id_box', '=', 'dokumen.id_box')
            ->leftJoin('map', 'map.id_map', '=', 'dokumen.id_map')
            // ->leftJoin('kelengkapan_dokumen', 'kelengkapan_dokumen.nama_kel_dokumen', '=', 'dokumen.nama_kel_dokumen')
            
            ->get();

        return DB::table('dokumen')

            ->where('status_dokumen', '=', 'Retensi')
            ->get();
    }

    // public function getDokumenAdminByDivisi($divisi)
    // {
    //     return DB::table('pengarsipan')
    //         ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'pengarsipan.no_dokumen')
    //         ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
    //         ->where('dokumen.id_departemen', '=', $divisi)
    //         ->orwhere('status_dokumen', '=', 'Tersedia')
    //         ->orwhere('status_dokumen', '=', 'Dipinjam')
    //         ->get();

    //     return DB::table('dokumen')
    //         ->where('dokumen.id_departemen', '=', $divisi)
    //         ->orwhere('status_dokumen', '=', 'Retensi')
    //         ->get();
    // }


    public function dataRetensi()
    {
        return DB::table('retensi')
            ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'retensi.no_dokumen')
            ->leftJoin('users', 'users.id', '=', 'retensi.id')
            ->get();
    }

    public function kelData()
    {
        return DB::table('kelengkapan_dokumen')
            ->get();
    }

    //modal add retensi
    public function insert_retensi($data, $data2)
    {
        if (DB::table('dokumen')->insert($data) && DB::table('retensi')->insert($data2)) {
            return true;
        } else {
            return false;
        }
    }

    //modal add arsip
    public function insert_dokumen($data, $data2)
    {
        if (DB::table('dokumen')->insert($data) && DB::table('pengarsipan')->insert($data2)) {
            return true;
        } else {
            return false;
        }
    }

    public function getDokumenById($id)
    {
        return DB::table('dokumen')
            ->select('*')
            ->leftJoin('ruang', 'ruang.id_ruang', '=', 'dokumen.id_ruang')
            ->leftJoin('rak', 'rak.id_rak', '=', 'dokumen.id_rak')
            ->leftJoin('box', 'box.id_box', '=', 'dokumen.id_box')
            ->leftJoin('map', 'map.id_map', '=', 'dokumen.id_map')
            ->where('no_dokumen', $id)
            ->get();
    }

    //untuk mengirimkan dokumen ke menu approval retensi
    public function softdelete_dokumen($update_dokumen, $no_dokumen)
    {
        if (DB::table('dokumen')->where('no_dokumen', $no_dokumen)->update($update_dokumen)) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_peminjaman($update_dokumen, $insert_peminjaman, $no_dokumen)
    {
        if (DB::table('dokumen')->where('no_dokumen', $no_dokumen)->update($update_dokumen) && DB::table('peminjaman')->insert($insert_peminjaman)) {
            return true;
        } else {
            return false;
        }
    }
}
