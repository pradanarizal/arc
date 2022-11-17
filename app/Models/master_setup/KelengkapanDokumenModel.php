<?php

namespace App\Models\master_setup;

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

    public function update_surat($data, $id_kel_dokumen)
    {
        if (DB::table('kelengkapan_dokumen')->where('id_kel_dokumen',$id_kel_dokumen)->update($data)){
            return true;
        }else{
            return false;
        }
    }

    public function delete_surat($id_kel_dokumen)
    {
        DB::table('kelengkapan_dokumen')->where('id_kel_dokumen', $id_kel_dokumen)->delete();
    }

}
