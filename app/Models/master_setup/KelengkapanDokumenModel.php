<?php

namespace App\Models\master_setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KelengkapanDokumenModel extends Model
{
    // use HasFactory;
    public function allMasterSurat()
    {
        return DB::table('master_surat')
        ->get();
    }
    //tambah opsi surat
    public function insert_surat($data)
    {
        if (DB::table('master_surat')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    public function update_surat($data, $id_surat)
    {
        if (DB::table('master_surat')->where('id_surat',$id_surat)->update($data)){
            return true;
        }else{
            return false;
        }
    }

    public function delete_surat($id_surat)
    {
        DB::table('master_surat')->where('id_surat', $id_surat)->delete();
    }

}
