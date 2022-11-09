<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BoxModel extends Model
{
    // use HasFactory;
    public function boxData()
    {
        return DB::table('box')
            ->get();
    }
}
