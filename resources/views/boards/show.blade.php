@extends('layouts.master')

@section('title')
    Show Board
@endsection

@section('content')
    <p style="margin-top:100px; margin-left:100px">Show Board</p>
    <div style="margin-top:10px; margin-left:100px">
    <p>제목 : {{$board->title}}</p>
    <p>내용 : {{$board->story}}</p>
    <a href="/boards/{{$board->id}}/edit"><button>수정</button></a>
    <form style="display:inline;" action="/boards/{{$board->id}}" method="POST">
        @csrf
        @method('DELETE')
    <button>삭제</button>
    </form>
    </div>
@endsection