<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DokumenModel extends Model
{
    //use HasFactory;
    public function allData()
    {
        return DB::table('dokumen')
            ->leftJoin('ruang', 'ruang.id_ruang', '=', 'dokumen.id_ruang')
            ->leftJoin('rak', 'rak.id_rak', '=', 'dokumen.id_rak')
            ->leftJoin('box', 'box.id_box', '=', 'dokumen.id_box')
            ->leftJoin('map', 'map.id_map', '=', 'dokumen.id_map')
            ->get();
    }

    public function allKelengkapanDokumen()
    {
        return DB::table('kelengkapan_dokumen')
            ->get();
    }

    public function getDokumenById($id)
    {   
        return DB::table('dokumen')
                ->select('*')
                ->where('no_dokumen', $id)
                ->get();
    }
}
