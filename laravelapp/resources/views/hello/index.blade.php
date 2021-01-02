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
        <p>好きなだけ記述できます。</p>
    @endsection
    @section('footer')
        copyright 2020 tuyano.
    @endsection