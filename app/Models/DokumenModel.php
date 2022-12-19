<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DokumenModel extends Model
{
    //Tampilan Data Dokumen (tersedia, dipinjam)
    //Integrasi from table ruang, rak, box, map, kelengkapan_dokumen
    public function allData()
    {
        return DB::table('dokumen')
            ->where('status_dokumen', '=', 'Tersedia')
            ->orwhere('status_dokumen', '=', 'Dipinjam')
            ->orwhere('status_dokumen', '=', 'Menunggu Approval')
            ->leftJoin('ruang', 'ruang.id_ruang', '=', 'dokumen.id_ruang')
            ->leftJoin('rak', 'rak.id_rak', '=', 'dokumen.id_rak')
            ->leftJoin('box', 'box.id_box', '=', 'dokumen.id_box')
            ->leftJoin('map', 'map.id_map', '=', 'dokumen.id_map')
            // ->orderBy('tgl_upload','DESC')
            ->get();

        return DB::table('dokumen')

            ->where('status_dokumen', '=', 'Retensi')
            ->get();
    }

    public function allDataTerbatas()
    {
        return DB::table('dokumen')
            ->where('status_dokumen', '=', 'Tersedia')
            ->where('status_dokumen', '=', 'Menunggu Approval')
            ->where('status_dokumen', '=', 'Dipinjam')
            ->orwhere('status_dokumen', '!=', 'Pengarsipan')
            ->where('jenis_dokumen', '=', 'Terbatas')
            ->leftJoin('ruang', 'ruang.id_ruang', '=', 'dokumen.id_ruang')
            ->leftJoin('rak', 'rak.id_rak', '=', 'dokumen.id_rak')
            ->leftJoin('box', 'box.id_box', '=', 'dokumen.id_box')
            ->leftJoin('map', 'map.id_map', '=', 'dokumen.id_map')
            // ->orderBy('tgl_upload','DESC')
            ->get();

        return DB::table('dokumen')

            ->where('status_dokumen', '=', 'Retensi')
            ->get();
    }
    
    public function allDataTerbuka()
    {
        return DB::table('dokumen')
            ->where('status_dokumen', '=', 'Tersedia')
            ->where('status_dokumen', '=', 'Menunggu Approval')
            ->where('status_dokumen', '=', 'Dipinjam')
            ->orwhere('jenis_dokumen', '=', 'Terbuka')
            ->leftJoin('ruang', 'ruang.id_ruang', '=', 'dokumen.id_ruang')
            ->leftJoin('rak', 'rak.id_rak', '=', 'dokumen.id_rak')
            ->leftJoin('box', 'box.id_box', '=', 'dokumen.id_box')
            ->leftJoin('map', 'map.id_map', '=', 'dokumen.id_map')
            // ->orderBy('tgl_upload','DESC')
            ->get();

        return DB::table('dokumen')

            ->where('status_dokumen', '=', 'Retensi')
            ->get();
    }
    
    public function getLastIdDokumen()
    {
        return DB::table('dokumen')
            ->select('id_dokumen')
            ->orderBy('id_dokumen', 'DESC')
            ->limit(1)
            ->get();
    }
    public function getDepartemen()
    {
        return DB::table('departemen')
            ->select('id_departemen', 'kode_departemen')
            ->get();
    }

    public function getDokumenByDivisi($divisi)
    {
        return DB::table('dokumen')
            ->where('status_dokumen', 'Tersedia' )
            ->where('status_dokumen', '=', 'Menunggu Approval')
            ->where('status_dokumen', '=', 'Dipinjam')
            ->orwhere('status_dokumen', '!=', 'Pengarsipan')
            ->where('jenis_dokumen', '=', 'Terbatas')
            ->where('dokumen.id_departemen', '=', $divisi)
            ->leftJoin('pengarsipan', 'pengarsipan.id_dokumen', '=', 'dokumen.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'pengarsipan.id')
            ->get();

    }

    public function getNamaPeminjam($id)
    {
        return DB::table('dokumen')
            ->where('status_dokumen', '=', 'Dipinjam')
            ->orwhere('status_dokumen', '=', 'Tersedia')
            ->orwhere('dokumen.id_departemen', '=', $id)
            ->leftJoin('peminjaman', 'peminjaman.id_dokumen', '=', 'dokumen.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'peminjaman.id')
            ->get();
    }

    public function dataRetensi()
    {
        return DB::table('retensi')
            ->leftJoin('dokumen', 'dokumen.id_dokumen', '=', 'retensi.id_dokumen')
            ->leftJoin('users', 'users.id', '=', 'retensi.id')
            ->get();
    }

    public function kelData()
    {
        return DB::table('kelengkapan_dokumen')
            ->get();
    }

    //modal add retensi
    public function insert_retensi($data2)
    {
        if (DB::table('retensi')->insert($data2)) {
            return true;
        } else {
            return false;
        }
    }

    public function addDokumen($data)
    {
        if (DB::table('dokumen')->insert($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function update_dokumen($update_dokumen, $no_dokumen)
    {
        if (DB::table('dokumen')->where('id_dokumen', $no_dokumen)->update($update_dokumen)) {
            return true;
        } else {
            return false;
        }
    }

    //modal add arsip
    public function insert_pengarsipan($data2)
    {
        if (DB::table('pengarsipan')->insert($data2)) {
            return true;
        } else {
            return false;
        }
    }

    public function getDokumenById($id)
    {
        return DB::table('dokumen')
            ->select('*')
            ->leftJoin('ruang', 'ruang.id_ruang', '=', 'dokumen.id_ruang')
            ->leftJoin('rak', 'rak.id_rak', '=', 'dokumen.id_rak')
            ->leftJoin('box', 'box.id_box', '=', 'dokumen.id_box')
            ->leftJoin('map', 'map.id_map', '=', 'dokumen.id_map')
            ->where('id_dokumen', $id)
            ->get();
    }

    //untuk mengirimkan dokumen ke menu approval retensi
    public function softdelete_dokumen($update_dokumen, $no_dokumen)
    {
        if (DB::table('dokumen')->where('no_dokumen', $no_dokumen)->update($update_dokumen)) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_peminjaman($insert_peminjaman)
    {
        if (DB::table('peminjaman')->insert($insert_peminjaman)) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_pengembalian($insert_pengembalian)
    {
        if (DB::table('pengembalian')->insert($insert_pengembalian)) {
            return true;
        } else {
            return false;
        }
    }
}
