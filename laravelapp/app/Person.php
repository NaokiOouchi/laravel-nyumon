<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    public function getData()
    {
        # code...
        return $this->id.':'.$this->name.'('.$this->age.')';
    }
}
