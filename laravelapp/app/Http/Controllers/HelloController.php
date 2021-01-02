<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        if ($request->hasCookie("msg")) {
            $msg="Coolie:".$request->cookie("msg");
        } else {
            $msg="※クッキーはありません。";
        }
        return view("hello.index", ["msg"=>$msg]);
    }
    public function post(Request $request)
    {
        $validate_rule = [
            "msg"=>"required",
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = response()->view("hello.index", ["msg"=>$msg]);
        $response->cookie("msg", $msg, 100);
        return $response;
    }
}
