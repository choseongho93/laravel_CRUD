<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use Illuminate\Support\Facades\Cache;

class BoardController extends Controller
{
    ## index page
    public function index(){
        Cache::store('redis')->put('name2', 'Jack22', 1);

        $getName = Cache::store('redis')->get('name222');
        print_r($getName);
//        $boards = Board::all();
//        return view('boards.index',compact('boards'));
    }

    ## 생성 page
    public function create(){
        return view('boards.create');
    }

    ## DB insert
    public function store(Request $request){
        $board = Board::create([
            'title'=>$request->input('title'),
            'story'=>$request->input('story')
        ]);
        return redirect('/boards/'.$board->id);
    }

    ## 하나의 데이터 view page
    public function show(Board $board){
        return view('boards.show',compact('board'));
    }

    ## 수정 page
    public function edit(Board $board){
        return view('boards.edit', compact('board'));
    }

    ## data update
    public function update(Board $board){
        $board->update(request(['title', 'story']));

        return redirect('/boards/'.$board->id);
    }

    public function destroy(Board $board){

        $board->delete();

        return redirect('/boards');
    }

    //Cache::store('redis')->remember(function())



}
