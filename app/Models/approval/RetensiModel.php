<?php

namespace App\Models\approval;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RetensiModel extends Model
{
    public function allData()
    {
        return DB::table('retensi')
            ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'retensi.no_dokumen')
            ->leftJoin('users', 'users.id', '=', 'retensi.id')
            ->where('status_dokumen','=','Retensi')
            ->get();
    }
}
