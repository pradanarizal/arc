<?php

namespace App\Http\Controllers\superadmin\master_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DatauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->User = new User();
    }

    public function index()
    {
        $data6 = [
            'users' => $this->User->userData()
        ];
        return view('superadmin.master_setup.data_user', $data6);
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
                'nama_user' => 'required',
                'email_user' => 'required|unique:users,email',
                'password' => 'required|min:8',
                'divisi' => 'required',
            ],
            [
                'nama_user.required' => 'Nama User wajib diisi',
                'email_user.required' => 'Nama User wajib diisi',
                'email_user.unique' => 'Nama Dokumen sudah ada',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 8 huruf/angka',
                'password.password' => 'Password lalalalalala',
                'divisi.required' => 'Divisi wajib diisi',
            ]
        );

        $data = [
            'name' => $request->input('nama_user'),
            'email' => $request->input('email_user'),
            'password' => $request->input('password'),
            'divisi' => $request->input('divisi'),
            'status_user' => $request->input('status_user'),
            'level' => $request->input('role'),
        ];
        if ($this->User->insert_datauser($data)) {
            return redirect('data_user')->with('toast_success', 'Berhasil Tambah user');
        } else {
            return redirect('data_user')->with('toast_error', 'Gagal Tambah user');
        }
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
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->input('nama_user'),
            'email' => $request->input('email_user'),
            'password' => $request->input('password'),
            'divisi' => $request->input('divisi'),
            'status_user' => $request->input('status_user'),
            'level' => $request->input('role'),
        ];
        if ($this->User->update_user($data, $id)) {
            return redirect('data_user')->with('toast_success', 'Berhasil Edit User');
        } else {
            return redirect('data_user');
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
        $this->User->delete_datauser($id);
        return redirect('/data_user')->with('toast_success', 'Berhasil Hapus Pengguna');
    }
}
