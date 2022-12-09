<?php

namespace App\Http\Controllers\superadmin\master_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Traits\notif_sidebar;

class DatauserController extends Controller
{

    use notif_sidebar;
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
        $data = [
            'users' => $this->User->userData(),
            'departemen'    => $this->User->getDepartemen(),
        ];
        return view('superadmin.master_setup.data_user', $data, $this->approval_pending());
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
        $request->validate([
            'nama_user' => 'required',
            'email_user' => 'required|unique:users,email',
            'password' =>'required',
            'id_departemen' => 'required',

            'password' => [
                'required',
                Rules\Password::min(8)
                    ->mixedCase()
                    // ->letters()
                    ->numbers()
                    // ->symbols()
                    ->uncompromised()
            ],
        ]);

        $data = [
            'name' => $request->input('nama_user'),
            'email' => $request->input('email_user'),
            'password' => Hash::make($request->input('password')),
            'id_departemen' => $request->input('id_departemen'),
            'status_user' => $request->input('status_user'),
            'level' => $request->input('role'),
        ];

        if ($this->User->insert_datauser($data)) {
            return redirect('/master_setup/data_user')->with('toast_success', 'Berhasil Tambah User');
        } else {
            return redirect('/master_setup/data_user');
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
            'password' => Hash::make($request->input('password')),
            'id_departemen' => $request->input('id_departemen'),
            'status_user' => $request->input('status_user'),
            'level' => $request->input('role'),
        ];
        if ($this->User->update_user($data, $id)) {
            return redirect('/master_setup/data_user')->with('toast_success', 'Berhasil Edit User');
        } else {
            return redirect('/master_setup/data_user');
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
        return redirect('/master_setup/data_user')->with('toast_success', 'Berhasil Hapus Pengguna');
    }
}
