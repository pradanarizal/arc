<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BoxModel extends Model
{
    // use HasFactory;
    public function boxData()
    {
        return DB::table('box')
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
