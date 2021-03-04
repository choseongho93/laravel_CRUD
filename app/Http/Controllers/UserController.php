<?php

namespace App\Http\Controllers;

use App\Board;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Models\UserModel;

/*************************
 * 유저 회원 가입 (API)
 * 유효성 검사와 세세한 부분은 제외한 간단한 CRUD
 *
 * Class UserController
 * @package App\Http\Controllers
 *************************/

class UserController extends Controller
{

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
    public function show()
    {
        /*$token = csrf_token(); echo $token;*/

        try {
            $UserData = UserModel::getAllData();
            $UserData ? $UserData : '';
            return [
                'result' => $UserData
            ];
        } catch (Exception $e) {
            log_message($e);
        }

        return;
    }

    ## 유저 등록
    public function store(Request $request){
        $user = [];
        $user['name'] = request('name') ?? '';
        $user['passwd'] = request('passwd') ?? '';
        $user['email'] = request('email') ?? '';

        try {
            $bool = UserModel::insertData($user);
            return $bool;
        }catch (Exception $e){
            log_message($e);
        }

        return;
    }

    ## 유저 데이터 수정
    public function update(){
        $user = [];
        $user['name'] = request('name') ?? '';
        $user['email'] = request('email') ?? '';

        try {
            $bool = UserModel::updateData($user);
            return $bool;
        }catch (Exception $e){
            log_message($e);
        }
        return;
    }

    ## 유저 데이터 삭제
    public function destroy(){
        $no = request('no') ?? '';

        try {
            $bool = UserModel::deleteData($no);
            return $bool;
        }catch (Exception $e){
            log_message($e);
        }

        return;
    }

    ## 특정 회원 이메일 발송
    public function sendEmail(){
        $no = request('no') ?? '';
        $user = UserModel::getUserEmail($no); // 특정 유저 Data 가져오기
        SendEmailJob::dispatch($user[0]->name, $user[0]->email);

    }

}
