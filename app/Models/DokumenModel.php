<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DokumenModel extends Model
{
    //use HasFactory;
    public function allData()
    {
        return DB::table('dokumen')
            ->get();
    }
    //public function getAllRangkaian()
    //{
    //  return DB::table('rangkaian_iklan')
    //    ->leftJoin('rangkaian', 'rangkaian.no_rangkaian', '=', 'rangkaian_iklan.no_rangkaian')
    //  ->get();
    //}
}
