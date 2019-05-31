<?php

namespace App\Http\Controllers;

use App\PeopleModel;
use Illuminate\Http\Request;

session_start();

class PeopleController extends Controller
{
    public $flag;

    public function checkModel(){
        //测试登陆
        //127.0.0.1/frame/system2/public/operatorLogin?user=administrator&password=111111
        $user = isset($_GET['user'])?$_GET['user']:"";
        $password = isset($_GET['password'])?$_GET['password']:"";

        $result = PeopleModel::checkAccount($user,$password);

        if($result){
            $_SESSION['flag']=1;
            header('HTTP/1.1 200 OK');
            return json_encode("登陆成功");
        } else{
            $_SESSION['flag']=0;
            header('HTTP/1.1 401 Unauthorized');
            exit(json_encode("用户名或密码错误"));
        }
    }


    public function readModel($choice){
        $queryName = isset($_GET['queryName'])?$_GET['queryName']:"";
        switch($choice){

            case "1":
                //测试学院查询
                //http://127.0.0.1/frame/system2/public/query/1?queryName=电信
                $result=PeopleModel::querySchool($queryName);
                if($result->isEmpty()){
                    header('HTTP/1.1 403 Forbidden');
                    return json_encode("无此学院");
                }else{
                    header('HTTP/1.1 200 OK');
                    return json_encode($result);
                }
                break;


            case "2":
                //测试部门查询
                //http://127.0.0.1/frame/system2/public/query/2?queryName=部门1
                $result=PeopleModel::queryDepartment($queryName);
                if($result->isEmpty()){
                    header('HTTP/1.1 403 Forbidden');
                    return json_encode("无此部门");
                }else{
                    header('HTTP/1.1 200 OK');
                    return json_encode($result);
                }
                break;

            default:
                exit(json_encode("查什么？？？？"));
        }
    }


    public function updateModel(){
        //测试修改
        //http://127.0.0.1/frame/system2/public/update?user=t&gender=男&age=1&school=学院1&department=部门2
        $user = isset($_GET['user'])?$_GET['user']:"";
        $gender = isset($_GET['gender'])?$_GET['gender']:"";
        $age = isset($_GET['age'])?$_GET['age']:"";
        $school = isset($_GET['school'])?$_GET['school']:"";
        $department = isset($_GET['department'])?$_GET['department']:"";

        $_SESSION['flag']=isset($_SESSION['flag'])?$_SESSION['flag']:"";

        if($_SESSION['flag']!=1){
            header('HTTP/1.1 401 Unauthorized');
            exit(json_encode("无权限"));
        }else {
            $result=PeopleModel::updatePeople($user,$gender,$age,$school,$department);
            if($result){
                header('HTTP/1.1 200 OK');
                return json_encode("修改成功");
            }else{
                header('HTTP/1.1 403 Forbidden');
                return json_encode("失败");
            }
        }
    }


    public function insertModel(){
        //测试添加
        // http://127.0.0.1/frame/system2/public/insert?user=t&gender=男&age=1&school=学院1&department=部门2
        $user = isset($_GET['user'])?$_GET['user']:"";
        $gender = isset($_GET['gender'])?$_GET['gender']:"";
        $age = isset($_GET['age'])?$_GET['age']:"";
        $school = isset($_GET['school'])?$_GET['school']:"";
        $department = isset($_GET['department'])?$_GET['department']:"";

        $_SESSION['flag']=isset($_SESSION['flag'])?$_SESSION['flag']:"";

        if($_SESSION['flag']!=1){
            header('HTTP/1.1 401 Unauthorized');
            exit(json_encode("无权限"));
        }else {
            $result=PeopleModel::insertPeople($user,$gender,$age,$school,$department);
            if($result){
                header('HTTP/1.1 200 OK');
                return json_encode("添加成功");
            }else{
                header('HTTP/1.1 403 Forbidden');
                return json_encode("失败");
            }
        }
    }
}
