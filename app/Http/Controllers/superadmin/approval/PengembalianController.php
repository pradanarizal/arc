<?php

namespace App\Http\Controllers\superadmin\approval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\approval\PengembalianModel;
use App\Models\DokumenModel;
use App\Traits\notif_sidebar;

class PengembalianController extends Controller
{
    use notif_sidebar;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->DokumenModel = new DokumenModel();
        $this->PengembalianModel = new PengembalianModel();
    }

    public function index()
    {
        $data = [
            'pengembalian' => $this->PengembalianModel->allData()
        ];
        return view('superadmin.approval.pengembalian', $data, $this->approval_pending());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_dokumen)
    {
        if($request->input('jenis') == 'approve'){
            
            $update_dokumen = [
                'status_dokumen'    => 'Tersedia'
            ];

            if($this->DokumenModel->update_dokumen($update_dokumen, $no_dokumen)) {
                $update_pengembalian = [
                    'tgl_pengembalian' => $request->input('tgl_pengembalian'),
                    'status_pengembalian' =>  $request->input('pengembalian'),
                    'updated_at' => \Carbon\Carbon::now()
                ];
                $this->PengembalianModel->approval_pengembalian($update_pengembalian, $no_dokumen);
                return redirect('/approval/pengembalian')->with('toast_success', 'Pengajuan Pengarsipan diteruskan ke Super Admin!');
            }else {
                return redirect('/approval/pengembalian');
            }    
        } elseif ($request->input('jenis') == 'tolak') {
            $update_dokumen = [
                'status_dokumen'    => 'Tersedia'
            ];

            if($this->DokumenModel->update_dokumen($update_dokumen, $no_dokumen)) {
                $update_pengembalian = [
                    'tgl_pengembalian' => $request->input('tgl_pengembalian'),
                    'status_pengembalian' =>  $request->input('pengembalian'),
                    'updated_at' => \Carbon\Carbon::now()
                ];
                $this->PengembalianModel->approval_pengembalian($update_pengembalian, $no_dokumen);
                return redirect('/approval/pengembalian')->with('toast_success', 'Pengajuan Pengarsipan diteruskan ke Super Admin!');
            } else {
                return redirect('/approval/pengembalian');
            } 
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
