<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KelengkapanDokumenModel extends Model
{
    // use HasFactory;
    public function keldokData()
    {
        return DB::table('kelengkapan_dokumen')
            ->get();
    }
}
