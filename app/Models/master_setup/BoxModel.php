<?php

namespace App\Models\master_setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BoxModel extends Model
{
    // use HasFactory;

    public function boxData()
    {
        return DB::table('box')
        ->leftJoin('rak', 'rak.id_rak', '=', 'box.id_rak')
        ->leftJoin('ruang', 'ruang.id_ruang', '=', 'box.id_ruang')
        ->get();
    }
    public function getRuang()
    {
        return DB::table('ruang')->get();
    }

    public function getRak()
    {
        return DB::table('rak')->get();
    }

    public function get_box_by_rak($id_rak){
        return DB::table('box')
        ->where('id_rak', $id_rak)
        ->get();
    }

    public function insert_box($data)
    {
        if (DB::table('box')->insert($data)){
            return true;
        }else{
            return false;
        }
    }


    public function delete_box($id_box)
    {
        DB::table('box')->where('id_box', $id_box)->delete();
    }

    public function update_box($data, $id_box)
    {
        if (DB::table('box')->where('id_box',$id_box)->update($data)){
            return true;
        }else{
            return false;
        }
    }
}
