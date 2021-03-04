<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UserModel extends Model{


    public static function getAllData()
    {
        return DB::select('select * from `user`');
    }

    public static function insertData($user)
    {
        return DB::insert('insert into user (`name`, passwd, email) values (?, ?, ?)', ["$user[name]", "$user[passwd]", "$user[email]"]);
    }

    public static function updateData($user)
    {
        return DB::update('update users set no = '.$user[no].' where email = ?', ["$user[email]"]);
    }

    public static function deleteData($no)
    {
        return DB::update('delete from user no = '.$no);
    }

    public static function getUserEmail($no)
    {
        return DB::select('select * from `user` where no ='.$no);
    }

}
