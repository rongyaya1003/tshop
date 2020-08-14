<?php
/**
 * Created by PhpStorm.
 * User: zgr
 * Date: 2020/8/11
 * Time: 9:59
 */

namespace app\admin\model;


class AdminModel extends BaseModel {

    //登录数据处理函数
    //获取控制器传过来的登录名和密码，根据登录名在数据库中获取密码
    //若密码一样则给控制器返回1，若密码存在但是不一样返回2，或密码不存在，返回3
    public function login($username, $password){
        $admin = \think\DB::name('admin')->where('admin_name','=',$username)->find();
        if($admin){
            if($admin['admin_password'] === md5($password)){
                //将登录id和名称存入session
                \think\Session::set('admin_id', $admin['admin_id']);
                \think\Session::set('admin_name', $admin['admin_name']);
                \think\Session::set('is_login', 1);
                return 1;
            }else{
                return 2;
            }
        }else{
            return 3;
        }
    }

}