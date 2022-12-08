<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    public function userData()
    {
        return DB::table('users')
            ->leftJoin('departemen', 'departemen.id_departemen', '=', 'users.id_departemen')
            ->get();
    }
    //Tambah Data User
    public function insert_datauser($data)
    {
        if (DB::table('users')->insert($data)){
            return true;
        }else{
            return false;
        }

        // if(DB::table('users')
        //     ->leftJoin('departemen', 'departemen.id_departemen', '=', 'users.id_departemen')
        //     ->insert($data))
    }

    public function getDepartemen()
    {
        return DB::table('departemen')->get();
    }
    
    //Delete Data User
    public function delete_datauser($id)
    {
        DB::table('users')->where('id', $id)->delete();
    }

    public function update_user($data, $id)
    {
        if (DB::table('users')->where('id',$id)->update($data)){
            return true;
        }else{
            return false;
        }
    }

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
