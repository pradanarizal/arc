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
            ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'retensi.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'retensi.id')
            ->where('status_dokumen', '=', 'Pending')
            ->orWhere('status_dokumen', '=', 'Retensi')
            ->orWhere('status_dokumen', '=', 'Ditolak')
            ->get();
    }

    public function approval_retensi($update_retensi, $no_dokumen)
    {
        if (DB::table('retensi')->where('id_dokumen', $no_dokumen)->update($update_retensi)) {
            return true;
        } else {
            return false;
        }
    }

    public function getRetensiById($id)
    {
        return DB::table('retensi')
            ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'retensi.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'retensi.id')
            ->where('id_retensi', '=', $id)
            ->get();
    }

    public function getRetensiByDivisi($divisi)
    {
        return DB::table('retensi')
            ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'retensi.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'retensi.id')
            ->where('dokumen.id_departemen', '=', $divisi)
            ->get();
    }
}
