<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        # code...
        return <<<EOF
        <html>
        <head>
        <title>HELLO/Index</title>
        <style>
        body {font-size:16pt; color:#999;}
        h1 {font-size:100pt; text-align:right; color:#eee;
            margin:-40px 0px -50px 0px;}
        </style>
        </head>
        <body>
            <h1>Index</h1>
            <p>これは、Helloコントローラのindexアクションです。</p>
        </body>
        </html>
        EOF;
    }
}
