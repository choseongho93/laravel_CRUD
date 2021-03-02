<?php

namespace App\Http\Controllers;

use App\Board;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\User;

/*************************
 * 유저 회원 가입 (API)
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

    public function show(){

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

    public function sendEmail(){
        $no = request('no') ?? '';
        $user = $this->GetUserEmail($no);
        SendEmailJob::dispatch($user->name, $user->email);
    }

    protected function GetUserEmail($no){

        $user = User::where('no', $no)->first();
        return $user;

    }
}
