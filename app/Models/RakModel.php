<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RakModel extends Model
{
    // use HasFactory;
    public function rakData()
    {
        return DB::table('rak')
            ->get();
    }

    public function insert_rak($data)
    {
        if (DB::table('rak')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    public function update_rak($data, $id_rak)
    {
        if (DB::table('rak')->where('id_rak',$id_rak)->update($data)){
            return true;
        }else{
            return false;
        }
    }
}
