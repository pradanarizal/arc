<?php

namespace App\Models\master_setup;

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
        if (DB::table('ruang')->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function update_ruang($data, $id_ruang)
    {
        if (DB::table('ruang')->where('id_ruang', $id_ruang)->update($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_ruang($id_ruang)
    {
        DB::table('ruang')->where('id_ruang', $id_ruang)->delete();
        // $result = parent::delete();

        // return $result;
        // $tabel_rak = DB::table('rak')->where('id_ruang', $id_ruang)->get();
        // $tabel_box = DB::table('box')->where('id_ruang', $id_ruang)->get();
        // $tabel_map = DB::table('map')->where('id_ruang', $id_ruang)->get();

        // if ($tabel_rak->count() > 0 || $tabel_box->count() > 0 || $tabel_map->count() > 0) {
        //     DB::table('ruang')->where('id_ruang', $id_ruang)->delete();;
        // }

        // $parent = DB::table('parent')->find($id);
        // $child = DB::table('child')->where('parent_id', $id)->get();
        // if ($child->count() == 0) {
        //     $parent = DB::table('parent')->where('id', $id)->delete();
        // } else {
        //     $child = DB::table('child')->where('parent_id', $id)->delete();
        // }
        // $parent = DB::table('parent')->where('id', $id)->delete();
    }
}
