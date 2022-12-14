<?php

namespace App\Http\Controllers\superadmin\master_setup;

use App\Http\Controllers\Controller;
use App\Models\master_setup\DepartemenModel;
use Illuminate\Http\Request;
use App\Traits\notif_sidebar;

class DepartemenController extends Controller
{
    use notif_sidebar;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->DepartemenModel = new DepartemenModel();
    }

    public function index()
    {
        $data = [
            'departemen' => $this->DepartemenModel->departemenData()
        ];
        return view('superadmin.master_setup.data_departemen', $data, $this->approval_pending());
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
        $this->validate(
            $request,
            [
                'kode_departemen' => 'required|unique:departemen,kode_departemen',
                'nama_departemen' => 'required|unique:departemen,nama_departemen'
            ],
            [
                'kode_departemen.required' => 'Kode Departemen wajib diisi!',
                'kode_departemen.unique' => 'Kode Departemen sudah ada!',
                'nama_departemen.required' => 'Nama Departemen wajib diisi!',
                'nama_departemen.unique' => 'Nama Departemen sudah ada!'
            ]
        );

        $data = [
            'kode_departemen' => $request->input('kode_departemen'),
            'nama_departemen' => $request->input('nama_departemen'),
        ];
        if ($this->DepartemenModel->insert_departemen($data)) {
            return redirect('/master_setup/data_departemen')->with('toast_success', 'Berhasil Tamabah Departemen!');
        } else {
            return redirect('/master_setup/data_departemen');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [];
        if($request->input('kode_departemen_edit') != $request->input('old_kode_departemen_edit')){
            $this->validate($request,
                [
                    'kode_departemen_edit' => 'required|unique:departemen,kode_departemen',
                    'nama_departemen_edit' => 'required'
                ],
                [
                    'kode_departemen_edit.required' => 'Kode Departemen wajib diisi!',
                    'kode_departemen_edit.unique' => 'Kode Departemen sudah ada!',
                    'nama_departemen_edit.required' => 'Nama Departemen wajib diisi!',
                ]
            );

            $data = [
                'kode_departemen' => $request->input('kode_departemen_edit'),
                'nama_departemen' => $request->input('nama_departemen_edit')
            ]; 

        } else {
            $this->validate($request,
                [
                    'kode_departemen_edit' => 'required',
                    'nama_departemen_edit' => 'required'
                ],
                [
                    'kode_departemen_edit.required' => 'Kode Departemen wajib diisi!',
                    'nama_departemen_edit.required' => 'Nama Departemen wajib diisi!',
                ]
            );  
        
            $data = [
                'kode_departemen' => $request->input('kode_departemen_edit'),
                'nama_departemen' => $request->input('nama_departemen_edit')
            ]; 
        }

        if ($this->DepartemenModel->update_departemen($data, $id)) {
            return redirect('/master_setup/data_departemen')->with('toast_success', 'Berhasil Edit Departemen');
        } else {
            return redirect('/master_setup/data_Departemen');
        }
    }

    public function destroy($id)
    {
        $this->DepartemenModel->delete_departemen($id);
        return redirect('/master_setup/data_departemen')->with('toast_success', 'Berhasil Hapus Departemen');
    }
}
