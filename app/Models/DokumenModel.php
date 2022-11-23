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
            ->where('status_dokumen', '=','Tersedia' )
            ->orwhere('status_dokumen', '=','Dipinjam' )
            ->leftJoin('ruang', 'ruang.id_ruang', '=', 'dokumen.id_ruang')
            ->leftJoin('rak', 'rak.id_rak', '=', 'dokumen.id_rak')
            ->leftJoin('box', 'box.id_box', '=', 'dokumen.id_box')
            ->leftJoin('map', 'map.id_map', '=', 'dokumen.id_map')
            ->get();
    }
    public function kelData()
    {
        return DB::table('kelengkapan_dokumen')
            ->get();
    }

    //modal add retensi
    public function insert_retensi($data)
    {
        if (DB::table('dokumen')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    //modal add arsip
    public function insert_dokumen($data)
    {
        if (DB::table('dokumen')->insert($data)){
            return true;
        }else{
            return false;
        }
    }
}
