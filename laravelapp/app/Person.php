<?php

namespace App;

use App\Scopes\ScopePerson;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $guarded = array("id");
    public static $rules = array(
        "name"=>"required",
        "mail"=>"email",
        "age"=>"integer|min:0|max:150"
    );
    public function getData()
    {
        # code...
        return $this->id.':'.$this->name.'('.$this->age.')';
    }
    public function boards()
    {
        # code...
        return $this->hasMany("App\Board");
    }
}
