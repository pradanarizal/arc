<?php

namespace App\Http\Controllers\superadmin\approval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\approval\PeminjamanModel;
use App\Traits\notif_sidebar;

class PeminjamanController extends Controller
{
    use notif_sidebar;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->PeminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
        $data = [
            'peminjaman' => $this->PeminjamanModel->allData()
        ];
        return view('superadmin.approval.peminjaman', $data, $this->approval_pending());
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
        {
            $update_peminjaman = [
                'tgl_ambil' => $request->input('tgl_peminjaman'),
                'status_peminjaman' =>  $request->input('peminjaman'),
                'updated_at' => \Carbon\Carbon::now()
            ];
    
            if ($request->input('jenis') == 'approve') {
                if ($this->PeminjamanModel->approval_peminjaman($update_peminjaman,  $no_dokumen)) {
                    return redirect('/approval/peminjaman')->with('toast_success', 'peminjaman di-Approve!');
                } else {
                    return redirect('/approval/peminjaman');
                }
            } elseif ($request->input('jenis') == 'tolak') {
                if ($this->PeminjamanModel->approval_peminjaman($update_peminjaman,  $no_dokumen)) {
                    return redirect('/approval/peminjaman')->with('toast_success', 'peminjaman di-Reject!');
                } else {
                    return redirect('/approval/peminjaman');
                }
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
