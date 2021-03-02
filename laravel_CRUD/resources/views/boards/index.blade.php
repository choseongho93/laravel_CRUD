@extends('layouts.master')

@section('title')
    Board Index
@endsection

@section('content')
    <p>게시판 목록</p>
    @foreach ($boards as $item)
        {{$item->title}}
    @endforeach
    <br>
    <a href="/boards/create"><button>글쓰기</button></a>
@endsection
