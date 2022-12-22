<?php

namespace App\Http\Controllers\admin\dokumen;

use App\Http\Controllers\Controller;
use App\Models\DokumenModel;
use App\Models\approval\PeminjamanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class DokumenadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->DokumenModel = new DokumenModel();
        $this->PeminjamanModel = new PeminjamanModel();
    }

    public function showPdfAdmin($namaPDF)
    {
        return Response::make(file_get_contents('data_file/'.$namaPDF.'.pdf'), 200, [
            'content-type'=>'application/pdf',
        ]);
    }
    //Halaman Detail Dokumen
    public function detail_data($id)
    {
        $data = [
            'dokumen' => $this->DokumenModel->getDokumenById($id),
            'peminjaman'    => $this->DokumenModel->getNamaPeminjam($id)
        ];
        return view('admin.menu_dokumen.detail_dokumen_admin', $data);
    }


    public function index()
    {
        $data = [
            'dokumen' => $this->DokumenModel->getDokumenByDivisi(Auth::user()->id_departemen),
            'kelengkapan_dokumen' => $this->DokumenModel->kelData(),
            'kelengkapan' => $this->DokumenModel->getKelengkapanMultiple(),

        ];
        return view('admin.menu_dokumen.dokumen_admin_terbatas', $data);
    }

    public function dokumen_terbuka_admin()
    {
        $data = [
            'dokumen' => $this->DokumenModel->allDataTerbuka(),
            'kelengkapan_dokumen' => $this->DokumenModel->kelData(),
            'kelengkapan' => $this->DokumenModel->getKelengkapanMultiple(),
        ];
        return view('admin.menu_dokumen.dokumen_admin_terbuka', $data);

    }

    public function store(Request $request)
    {
        // nama file
        // echo 'File Name: ' . $file->hashName();
        // echo '<br>';

        // ekstensi file
        // echo 'File Extension: ' . $file->getClientOriginalExtension();
        // echo '<br>';

        // real path
        // echo 'File Real Path: ' . $file->getRealPath();
        // echo '<br>';

        // ukuran file
        // echo 'File Size: ' . $file->getSize();
        // echo '<br>';
        // tipe mime
        // echo 'File Mime Type: ' . $file->getMimeType();
        
        $direktori_file = 'data_file';

        if ($request->input('jenis') == 'Retensi') {
            $request->validate(
                [
                    'file_ret_admin' => 'required|unique:dokumen,file_dokumen|max:50000|mimes:pdf',
                    'kelengkapan_dokumen_retensi' => 'required',
                    'nama_dokumen_ret_admin' => 'required',
                    'nomor_dokumen_ret_admin' => 'required',
                    'tahun_dokumen_ret_admin' => 'required',
                    'deskripsi_dokumen_ret_admin' => 'required',
                ],
                [
                    'file_ret_admin.required' => 'File dokumen wajib diupload!',
                    'file_ret_admin.mimes'    => 'File dokumen wajib berekstensi .pdf',
                    'file_ret_admin.max'      => 'File dokumen tidak boleh lebih dari 50Mb',
                    'kelengkapan_dokumen_retensi.required' => 'Pilih kelengkapan dokumen!',
                    'nama_dokumen_ret_admin.required' => 'Nama Dokumen wajib diisi!',
                    'nomor_dokumen_ret_admin.required' => 'Nomor Dokumen wajib diisi!',
                    'tahun_dokumen_ret_admin.required' => 'Pilih tahun dokumen!',
                    'deskripsi_dokumen_ret_admin.required' => 'Deskripsi wajib diisi!',
                ]
            );

            $file = $request->file('file_ret_admin');
            $dok = $request->input('nama_dokumen_ret_admin');
            $file_dokumen = $file->move($direktori_file, "$dok" . ".pdf");
            $kelengkapan_dokumen = implode(', ', $request->kelengkapan_dokumen_retensi);

            $data = [
                'no_dokumen'        => $request->nomor_dokumen_ret_admin,
                'nama_dokumen'      => $request->nama_dokumen_ret_admin,
                'tahun_dokumen'     => $request->tahun_dokumen_ret_admin,
                'deskripsi'         => $request->deskripsi_dokumen_ret_admin,
                'id_departemen'     => Auth::user()->id_departemen,
                'tgl_upload'        => \Carbon\Carbon::now(),
                'status_dokumen'    => 'Retensi',
                'nama_kel_dokumen'  => $kelengkapan_dokumen,
                'file_dokumen'      => $file_dokumen,
                'created_at'        => \Carbon\Carbon::now(),
            ];

            if ($this->DokumenModel->addDokumen($data)) {
                $last_id_dokumen = $this->DokumenModel->getLastIdDokumen();
                if (count($last_id_dokumen) == 1) {
                    $idDokumen = $last_id_dokumen[0]->id_dokumen;
                    $data2 = [
                        'status_retensi' => 'Pending',
                        'created_at' => \Carbon\Carbon::now(),
                        'id_dokumen' => $idDokumen,
                        'id' => Auth::user()->id,
                    ];
                    $this->DokumenModel->insert_retensi($data2);
                }
            
                return redirect('/riwayat/riwayat_retensi')->with('toast_success', 'Pengajuan Retensi diteruskan ke Approval Retensi Arsip!');
            }else {
                return redirect('/riwayat/riwayat_retensi')->with('toast_success', 'Gagal Retensi Dokumen');
            }  
        } elseif ($request->input('jenis') == 'Pengarsipan') {
            $request->validate(
                [
                    'file_pengarsipan_admin' => 'required|unique:dokumen,file_dokumen|max:50000|mimes:pdf',
                    'kelengkapan_dokumen_pengarsipan' => 'required',
                    'nama_dokumen_pengarsipan_admin' => 'required',
                    'nomor_dokumen_pengarsipan_admin' => 'required',
                    'tahun_dokumen_pengarsipan_admin' => 'required',
                    'deskripsi_dokumen_pengarsipan_admin' => 'required',

                ],
                [
                    'file_pengarsipan_admin.required' => 'File dokumen wajib diupload!',
                    'file_pengarsipan_admin.mimes' => 'File dokumen wajib berekstensi .pdf',
                    'file_pengarsipan_admin.max' => 'File dokumen tidak boleh lebih dari 50Mb',
                    'kelengkapan_dokumen_pengarsipan.required' => 'Pilih kelengkapan dokumen!',
                    'nama_dokumen_pengarsipan_admin.required' => 'Nama Dokumen wajib diisi!',
                    'nomor_dokumen_pengarsipan_admin.required' => 'Nomor Dokumen wajib diisi!',
                    'tahun_dokumen_pengarsipan_admin.required' => 'Pilih tahun dokumen!',
                    'deskripsi_dokumen_pengarsipan_admin.required' => 'Deskripsi wajib diisi!',
                ]
            );

            $file = $request->file('file_pengarsipan_admin');
            $dok = $request->nama_dokumen_pengarsipan_admin;
            $file_dokumen = $file->move($direktori_file, "$dok" . ".pdf");
            $kelengkapan_dokumen = implode(', ', $request->kelengkapan_dokumen_pengarsipan);

            $data = [
                'no_dokumen'        => $request->nomor_dokumen_pengarsipan_admin,
                'nama_dokumen'      => $request->nama_dokumen_pengarsipan_admin,
                'tahun_dokumen'     => $request->tahun_dokumen_pengarsipan_admin,
                'deskripsi'         => $request->deskripsi_dokumen_pengarsipan_admin,
                'id_departemen'     => Auth::user()->id_departemen,
                'tgl_upload'        => \Carbon\Carbon::now(),
                'status_dokumen'    => 'Pengarsipan',
                'jenis_dokumen'     => $request->input('jenis_dokumen_admin'),
                'nama_kel_dokumen'  => $kelengkapan_dokumen,
                'file_dokumen'      => $file_dokumen,
                'created_at'        => \Carbon\Carbon::now(),
            ];

            if ($this->DokumenModel->addDokumen($data)) {
                $last_id_dokumen = $this->DokumenModel->getLastIdDokumen();
                if (count($last_id_dokumen) == 1) {
                    $idDokumen = $last_id_dokumen[0]->id_dokumen;
                    $data2 = [
                        'status_pengarsipan' => 'Pending',
                        'created_at' => \Carbon\Carbon::now(),
                        'id_dokumen' => $idDokumen,
                        'id' => Auth::user()->id,
                    ];
                    $this->DokumenModel->insert_pengarsipan($data2);
                }
            
                return redirect('/riwayat/riwayat_pengarsipan')->with('toast_success', 'Pengajuan Pengarsipan diteruskan ke Approval Arsip superadmin!');
            }else {
                return redirect('/riwayat/riwayat_pengarsipan')->with('toast_error', 'Gagal Arsip Dokumen');
            } 
        }
    }

    public function pinjam_dokumenById(Request $request, $no_dokumen)
    {
        $request->validate(
            [
                'tgl_ambil'     => 'required',
                'tgl_kembali'   => 'required',
            ],
            [
                'tgl_ambil.required'    => 'Tanggal Peminjaman Tidak Boleh Kosong',
                'tgl_kembali.required'  => 'Tanggal Pengembalian Harus diisi',
            ]
        );

        $update_dokumen = [
            'status_dokumen'    => 'Menunggu Approval'
        ];

        if($this->DokumenModel->update_dokumen($update_dokumen, $no_dokumen)) {
            $last_id_dokumen = $this->DokumenModel->getLastIdDokumen();
            if(count($last_id_dokumen) == 1) {
                $id_dokumen = $last_id_dokumen[0]->id_dokumen;
                $insert_peminjaman = [
                    'id_dokumen'    => $request->input('id_dokumen'),
                    'tgl_ambil'     => $request->input('tgl_ambil'),
                    'tgl_kembali'   => $request->input('tgl_kembali'),
                    'status_peminjaman' => 'Pending',
                    'id'                => Auth::user()->id,
                ];
                $this->DokumenModel->insert_peminjaman($insert_peminjaman);
            }
            return redirect('/riwayat/riwayat_peminjaman')->with('toast_success', 'Pengajuan Pengarsipan diteruskan ke Super Admin!');
        } else {
            return redirect('/riwayat/riwayat_peminjaman');
        }
    }

    public function pengembalian_dokumenById(Request $request, $no_dokumen)
    {
        $insert_pengembalian = [
            'id_dokumen'        => $request->input('id_dokumen'),
            'tgl_pengembalian'  => $request->input('tgl_kembali'),
            'status_pengembalian' => 'Pending',
            'id_peminjaman'       => $request->input('id_peminjaman'),
            'id'                  => Auth::user()->id,
        ];

        if ($this->DokumenModel->insert_pengembalian($insert_pengembalian, $no_dokumen)) {
            return redirect('/riwayat/riwayat_peminjaman')->with('toast_success', 'Pengembalian Dokumen diteruskan ke Super Admin!');
        } else {
            return redirect('/riwayat/riwayat_peminjaman');
        }
    }
}
