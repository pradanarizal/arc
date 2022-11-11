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

    public function update_ruang($id, $data)
    {
        if (DB::table('users')->where('id', $id)->update($data)) {
            return true;
        } else {
            return false;
        }
    }
}
