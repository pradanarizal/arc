<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RuangModel extends Model
{
    // use HasFactory;
    public function ruangData()
    {
        return DB::table('ruang')
            ->get();
    }

    public function insert_ruang($data)
    {
        if (DB::table('ruang')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    public function update_ruang($data, $id_ruang)
    {
        if (DB::table('ruang')->where('id_ruang',$id_ruang)->update($data)){
            return true;
        }else{
            return false;
        }
    }
    
    public function delete_ruang($id_ruang)
    {
        DB::table('ruang')->where('id_ruang', $id_ruang)->delete();
    }
}
