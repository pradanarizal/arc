<?php

namespace App\Models\master_setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DepartemenModel extends Model
{
    // use HasFactory;
    public function departemenData()
    {
        return DB::table('departemen')
            ->get();
    }

    public function insert_departemen($data)
    {
        if (DB::table('departemen')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    public function update_departemen($data, $id_departemen)
    {
        if (DB::table('departemen')->where('id_departemen',$id_departemen)->update($data)){
            return true;
        }else{
            return false;
        }
    }

    public function delete_departemen($id_departemen)
    {
        DB::table('departemen')->where('id_departemen', $id_departemen)->delete();
    }
}
