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
        return view('superadmin.data_user', $data6);
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
        //
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
