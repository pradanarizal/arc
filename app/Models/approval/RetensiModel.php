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
            ->where('status_dokumen', '=', 'Pending')
            ->orWhere('status_dokumen', '=', 'Retensi')
            ->get();
    }

    public function approval_retensi($update_retensi, $update_dokumen, $no_dokumen)
    {
        if (DB::table('dokumen')->where('no_dokumen', $no_dokumen)->update($update_dokumen) && DB::table('retensi')->where('no_dokumen', $no_dokumen)->update($update_retensi)) {
            return true;
        } else {
            return false;
        }
    }
}
