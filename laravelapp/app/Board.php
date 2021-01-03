<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = array("id");
    public static $rules = array(
        "person_id"=>"required",
        "title"=>"required",
        "message"=>"required"
    );
    public function getData()
    {
        # code...
        return $this->id.':'.$this->title.'('.$this->person->name.')';
    }
    public function person()
    {
        # code...
        return $this->belongsTo("App\Person");
    }
}
