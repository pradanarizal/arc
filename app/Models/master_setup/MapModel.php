<?php

namespace App\Models\master_setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MapModel extends Model
{
    // use HasFactory;
    public function mapData()
    {
        return DB::table('map')
            ->leftJoin('box', 'box.id_box', '=', 'map.id_box') // relasi table map ke table box
            ->leftJoin('rak', 'rak.id_rak', '=', 'map.id_rak') // relasi table box ke table rak
            ->leftJoin('ruang', 'ruang.id_ruang', '=', 'map.id_ruang') // relasi table rak ke table ruang
            ->get();
    }

    public function get_map_by_box($id_box)
    {
        return DB::table('map')
            ->where('id_box', $id_box)
            ->get();
    }

    public function getRuang()
    {
        return DB::table('ruang')->get();
    }

    public function insert_map($data)
    {
        if (DB::table('map')->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_map($id_map)
    {
        DB::table('map')->where('id_map', $id_map)->delete();
    }


    public function update_map($data, $id_map)
    {
        if (DB::table('map')->where('id_map', $id_map)->update($data)) {
            return true;
        } else {
            return false;
        }
    }
}
