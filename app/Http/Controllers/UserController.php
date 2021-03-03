<?php

namespace App\Http\Controllers;

use App\Board;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\User;

/*************************
 * 유저 회원 가입 (API)
 * 유효성 검사와 세세한 부분은 제외한 간단한 CRUD
 *
 * Class UserController
 * @package App\Http\Controllers
 *************************/

class UserController extends Controller
{
    protected $bool = 0;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    ## 유저 리스트
    public function show(){
        //$token = csrf_token();
        try {
            $users =  User::all();
            $users_conut = User::count();
        }catch (Exception $e){
            $this->bool = -1;
        }

        return [
            'result' => $users,
            'error_message' => $users ? '' : '처리중 오류가 발생했습니다. 다시 시도해주시기 바랍니다.',
            'code' => $users ? $this->bool : -1,
            'count'=>$users_conut
        ];
    }

    ## 유저 등록
    public function store(Request $request){

        $name = request('name') ?? '';
        $passwd = request('passwd') ?? '';
        $email = request('email') ?? '';

        try {
            $user = new User;

            $user->name = $name;
            $user->passwd = $passwd;
            $user->email = $email;

            $user->save();

//            $user = User::create([
//                'name'=>$name,
//                'passwd'=>$passwd,
//                'email'=>$email
//            ]);
        }catch (Exception $e){
            $this->bool = -1;
        }

        $result = $user ? $this->bool : -1;

        return $result;

    }

    ## 유저 데이터 수정
    public function update(){
        $no = request('no') ?? '';
        $email = request('email') ?? '';

        try {
            $user = User::where('no', '=', $no)->update(['email' => $email]);
        }catch (Exception $e){
            $this->bool = -1;
        }

        $result = $user ? $this->bool : -1;

        return $result;
    }

    ## 유저 데이터 삭제
    public function destroy(){
        $no = request('no') ?? '';

        try {
            $user = User::where('no', '=', $no)->delete();
        }catch (Exception $e){
            $this->bool = -1;
        }

        $result = $user ? $this->bool : -1;

        return $result;
    }

    ## 특정 회원 이메일 발송
    public function sendEmail(){
        $no = request('no') ?? '';
        $user = $this->GetUserEmail($no);
        SendEmailJob::dispatch($user->name, $user->email);
    }

    ## 유저 정보 Get
    protected function GetUserEmail($no){
        $user = User::where('no', $no)->first();
        return $user;

    }
}
