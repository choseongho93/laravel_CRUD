<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPodcast;

use Illuminate\Http\Request;
use App\Board;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;



class BoardController extends Controller
{
    ## index page
    public function index(){

        ## Cache
//        Cache::set('names','Nate');
//        $value = Cache::get('names');
//        echo $value;

        ## Redis
//        Redis::set("채소", 3);
//        $var1 = Redis::incr("채소"); // KEY 채소에 value 1증가
//        echo $var1;
//
//        Redis::set("과일", 5);
//        $var2 = Redis::incrBy("과일",30); // KEY 채소에 value 1증가
//        echo $var2;
//
//        Redis::set("고기", 0.025);
//        $var3 = Redis::incrByFloat("고기",0.015); // KEY 채소에 value 1증가
//        echo $var3;

        ## 캐시(레디스)
//        Cache::store('redis')->put('name','Nate',600);
//        $value = Cache::store('redis')->get('name');
//        echo 'name : '.$value;
//        exit;


/***********************************************************
 *
************************************************************/

//        $value2 = Cache::get('name');
//        echo 'test'.$value2;
//
//        $value = Cache::get('name', function () {
//           return "qwe";
//            //return DB::table('user_info')->get();
//        });
//        echo 'test'.$value;

//        phpinfo();
        echo "Test";
        exit;
        //$boards = Board::all();
        return view('boards.index',compact('boards'));
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

    public function test(){


//        $uid ='11';
//        $targetContentId ='11';
//        $type ='11';
//        $contentId ='11';
//        $sendPush ='11';
//
//        $job = new ProcessPodcast($uid,$targetContentId,$type,$contentId,$sendPush);
//        dispatch($job)->onConnection('database');
    }

}

