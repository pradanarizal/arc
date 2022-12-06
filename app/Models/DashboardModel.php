<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DashboardModel extends Model
{
    use HasFactory;
    // protected $fillable = ['stockName', 'stockPrice', 'stockYear'];

    public function getRuang()
    {
        return DB::table('ruang')->count();
    }

    public function getDokumen()
    {
        return DB::table('dokumen')->count();
    }
    public function getDataChart()
    {
        return DB::select("SELECT nama_ruang, COUNT(nama_ruang) AS total FROM dokumen JOIN ruang ON dokumen.id_ruang = ruang.id_ruang GROUP BY nama_ruang");
    }
}
