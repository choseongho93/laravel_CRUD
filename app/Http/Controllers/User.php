<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;


class User extends Controller
{
    protected $users;

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
    
    ## 모든 유저 정보
    public function getUsersAll(){
        $users = DB::select('select * from user_info ');
        
        $result = $this->objectToArray($users);
        return $result;
    }

    ## 특정 유저 정보
    public function getByNoData($no)
    {
        $user = DB::select('select * from user_info where no ='.$no);
        
        //$user = $this->users->find($id);

        $result = $this->objectToArray($user);
        return $result[0];
    }

    ## Object to Array
    private function objectToArray(&$object)
    {
        return @json_decode(json_encode($object), true);
    }



}

