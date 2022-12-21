<?php

namespace App\Http\Controllers\superadmin\approval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\approval\PengarsipanModel;
use App\Traits\notif_sidebar;

class PengarsipanController extends Controller
{
    use notif_sidebar;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->PengarsipanModel = new PengarsipanModel();
    }

    public function lokasi_dokumen($id_ruang)
    {
        $lokasi = $this->PengarsipanModel->get_lokasi_dokumen($id_ruang);
        return response()->json($lokasi);
    }

    public function index()
    {
        $data = [
            'pengarsipan' => $this->PengarsipanModel->allData(),
            'ruang' => $this->PengarsipanModel->getRuang(),
            'rak' => $this->PengarsipanModel->getRak(),
            'box' => $this->PengarsipanModel->getBox(),
            'map' => $this->PengarsipanModel->getMap()
        ];
        return view('superadmin.approval.pengarsipan', $data, $this->approval_pending());
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
        $update_pengarsipan = [
            'tgl_pengarsipan' => \Carbon\Carbon::now(),
            'status_pengarsipan' =>  $request->input('pengarsipan'),
            'updated_at' => \Carbon\Carbon::now(),
            'catatan'    =>$request->input('catatan_tolak'),
        ];

        if ($request->input('jenis') == 'approve') {
            $request->validate([
                'ruangapp' => 'required',
                'rakApp' => 'required',
                'box_3' => 'required',
                'map_3' => 'required'
            ], [
                'ruangapp.required' => 'Ruang Harus Dipilih!',
                'rakApp.required' => 'Rak Harus Dipilih!',
                'box_3.required' => 'Box Harus Dipilih!',
                'map_3.required' => 'Map Harus Dipilih!'
            ]);
            $update_dokumen = [
                'status_dokumen' => $request->input('status_dok'),
                'updated_at' => \Carbon\Carbon::now(),
                'id_ruang' => $request->input('ruangapp'),
                'id_rak' => $request->input('rakApp'),
                'id_box' => $request->input('box_3'),
                'id_map' => $request->input('map_3'),
            ];
            if ($this->PengarsipanModel->approval_arsip($update_dokumen, $update_pengarsipan, $no_dokumen)) {
                return redirect('/approval/pengarsipan')->with('toast_success', 'Pengarsipan di-Approve!');
            } else {
                return redirect('/approval/pengarsipan');
            }
        } elseif ($request->input('jenis') == 'tolak') {
            $update_dokumen = [
                'status_dokumen' => $request->input('status_dok'),
                'updated_at' => \Carbon\Carbon::now()
            ];

            if ($this->PengarsipanModel->approval_arsip($update_dokumen, $update_pengarsipan, $no_dokumen)) {
                return redirect('/approval/pengarsipan')->with('toast_success', 'Pengarsipan di-Reject!');
            } else {
                return redirect('/approval/pengarsipan');
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
