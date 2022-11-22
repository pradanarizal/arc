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

    public function getDokumen() {
        return DB::table('dokumen')->count();
    }
}
