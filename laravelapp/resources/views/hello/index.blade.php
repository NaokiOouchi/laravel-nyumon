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
        <ui>
            @each('components.item', $data, 'item')
        </ui>
    @endsection
    @section('footer')
        copyright 2020 tuyano.
    @endsection