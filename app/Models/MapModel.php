<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MapModel extends Model
{
    // use HasFactory;
    public function mapData()
    {
        return DB::table('map')
            ->get();
    }

    public function insert_map($data)
    {
        if (DB::table('map')->insert($data)){
            return true;
        }else{
            return false;
        }
    }
}
