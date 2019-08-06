<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    //
    public function users(){
        return $this->hasMary(User::class);
    }
}
