<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KelengkapanDokumenModel extends Model
{
    // use HasFactory;
    public function keldokData()
    {
        return DB::table('kelengkapan_dokumen')
            ->get();
    }
    //tambah opsi surat
    public function insert_surat($data)
    {
        if (DB::table('kelengkapan_dokumen')->insert($data)){
            return true;
        }else{
            return false;
        }
    }
}
