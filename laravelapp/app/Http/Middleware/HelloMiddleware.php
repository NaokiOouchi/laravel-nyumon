<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = [
            ["name"=>"山田太郎","mail"=>"taro@yamada"],
            ["name"=>"田中はなこ","mail"=>"hanako@tanaka"],
            ["name"=>"鈴木さちこ","mail"=>"sachiko@happy"]
        ];
        $request->merge(["data"=>$data]);
        return $next($request);
    }
}
