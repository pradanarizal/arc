<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RakModel extends Model
{
    // use HasFactory;
    public function rakData()
    {
        return DB::table('rak')
            ->get();
    }
}
