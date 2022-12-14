<?php

namespace App\Http\Controllers\superadmin\approval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\approval\RetensiModel;
use App\Traits\notif_sidebar;

class RetensiController extends Controller
{
    use notif_sidebar;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->RetensiModel = new RetensiModel();
    }

    public function index()
    {
        $data = [
            'retensi' => $this->RetensiModel->allData()
        ];
        return view('superadmin.approval.retensi', $data, $this->approval_pending());
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
        $update_retensi = [
            'tgl_retensi' => \Carbon\Carbon::now(),
            'status_retensi' =>  $request->input('retensi'),
            'updated_at' => \Carbon\Carbon::now()
        ];

        if ($request->input('jenis') == 'approve') {
            if ($this->RetensiModel->approval_retensi($update_retensi,  $no_dokumen)) {
                return redirect('/approval/retensi')->with('toast_success', 'Retensi di-Approve!');
            } else {
                return redirect('/approval/retensi');
            }
        } elseif ($request->input('jenis') == 'tolak') {
            $request->validate(
                [
                    'catatan_retensi_tolak'     => 'required',
                ],
                [
                    'catatan_retensi_tolak.required'  => 'Catatan tidak boleh kosong!'
                ]
            );
    
            $update_retensi = [
                'tgl_retensi' => \Carbon\Carbon::now(),
                'status_retensi' =>  $request->input('retensi'),
                'updated_at' => \Carbon\Carbon::now(),
                'catatan'   => $request->input('catatan_retensi_tolak')
            ];
            
            if ($this->RetensiModel->approval_retensi($update_retensi,  $no_dokumen)) {
                return redirect('/approval/retensi')->with('toast_success', 'Retensi di-Reject!');
            } else {
                return redirect('/approval/retensi');
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
