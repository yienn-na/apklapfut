<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function pull($lapfut,$f ){
        return DB::table($lapfut)->where($f)->first();
    }
}
