<?php

namespace App\Http\Controllers;

class HelloController extends Controller
{
    public function index()
    {
        $data = [
            ["name"=>"山田太郎","mail"=>"taro@yamada"],
            ["name"=>"田中はなこ","mail"=>"hanako@tanaka"],
            ["name"=>"鈴木さちこ","mail"=>"sachiko@happy"]
        ];
        return view("hello.index", ["data"=>$data]);
    }
}
