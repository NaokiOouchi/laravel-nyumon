@extends('layouts.helloapp')
@section('title')
    Index
@endsection
    @section('menubar')
        @parent
        インデックスページ
    @endsection
    @section('content')
        <p>ここが本文のコンテンツです。</p>
        <p>Controller value<br>'message' = {{$message}}</p>
        <p>View Composer value <br>'view_message' = {{$view_message}}</p>
    @endsection
    @section('footer')
        copyright 2020 tuyano.
    @endsection