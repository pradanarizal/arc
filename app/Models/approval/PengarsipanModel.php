<?php

namespace App\Models\approval;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengarsipanModel extends Model
{
    public function allData()
    {
        return DB::table('pengarsipan')
            ->leftJoin('dokumen', 'dokumen.no_dokumen', '=', 'pengarsipan.no_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
            ->where('status_dokumen', '=', 'Pengarsipan')
            ->get();
    }
}
