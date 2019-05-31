<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class PeopleModel extends Model
{

    public static function checkAccount($user,$password){
        //法一：
        //$result=DB::select('select * from administrator where name=? and password=?',[$user,$password]);
        //法二：
        $result=DB::table('administrator')->where(['name'=>$user,'password'=>$password])->first();

        return $result;
    }


    public static function querySchool($queryName){
        $result=DB::table('people')->where(['school'=>$queryName])->get();
        return $result;
    }

    public static function queryDepartment($queryName){
        $result=DB::table('people')->where(['department'=>$queryName])->get();
        return $result;
    }


    public static function updatePeople($user,$gender,$age,$school,$department){
        $row=DB::table('people')->where(['name'=>$user])->first();
        $rowId=isset($row->id)?($row->id):'';     //修改名字所在行的id
        $result = DB::table('people')->where('id', $rowId)->update(
            ['name' => $user, 'gender' => $gender, 'age' => $age,
                'school' => $school, 'department' => $department]
        );
        return $result;
    }


    public static function insertPeople($user,$gender,$age,$school,$department){
        $result=DB::table('people')->insert(
            ['name'=>$user,'gender'=>$gender,'age'=>$age,
                'school'=>$school,'department'=>$department]
        );
        return $result;
    }
}
