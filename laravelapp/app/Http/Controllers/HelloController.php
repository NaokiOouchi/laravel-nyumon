<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function getAuth(Request $request)
    {
        $param = ["message"=>"ログインしてください。"];
        return view("hello.auth", $param);
    }
    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $msg = "ログインしました。(".Auth::user()->name.")";
        } else {
            $msg = "ログインに失敗しました。";
        }
        return view("hello.auth", ["message"=>$msg]);
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $sort=$request->sort;
        // $items = DB::table('people')->simplePaginate(5);
        // $items = Person::orderBy($sort, "asc")->simplePaginate(5);}
        $items = Person::orderBy($sort, "asc")->paginate(5);
        return view("hello.index", ["items"=>$items,"sort"=>$sort,"user"=>$user]);
    }
    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return view("hello.index", ["items"=>$items]);
    }
    public function add(Request $request)
    {
        return view("hello.add");
    }
    public function create(Request $request)
    {
        $param = [
            "name" => $request->name,
            "mail" => $request->mail,
            "age" => $request->age,
        ];
        DB::insert('insert into people (name,mail,age) values (:name, :mail, :age)', $param);
        return redirect("/hello");
    }
    public function edit(Request $request)
    {
        $param = ["id"=>$request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view("hello.edit", ["form"=>$item[0]]);
    }
    public function update(Request $request)
    {
        $param = [
            "id" => $request->id,
            "name" => $request->name,
            "mail" => $request->mail,
            "age" => $request->age,
        ];
        DB::update('update people set name = :name,
        mail = :mail,age = :age where id = :id', $param);
        return redirect("/hello");
    }
    public function del(Request $request)
    {
        $param = ["id"=>$request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view("hello.del", ["form"=>$item[0]]);
    }
    public function remove(Request $request)
    {
        $param = ["id"=>$request->id];
        $item = DB::delete('delete from people where id = :id', $param);
        return redirect("/hello");
    }
    public function show(Request $request)
    {
        $name= $request->name;
        $items = DB::table('people')
        ->where("name", "like", "%".$name."%")
        ->orWhere("mail", "like", "%".$name."%")
        ->get();
        return view("hello.show", ["items"=>$items]);
    }
    public function rest()
    {
        return view("hello.rest");
    }
    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get("msg");
        return view("hello.session", ["session_data"=>$sesdata]);
    }
    public function ses_put(Request $request)
    {
        $msg=$request->input;
        $request->session()->put("msg", $msg);
        return redirect("hello/session");
    }
}
