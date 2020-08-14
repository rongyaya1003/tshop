<?php
/**
 * Created by PhpStorm.
 * User: zgr
 * Date: 2020/8/11
 * Time: 10:37
 */

namespace app\admin\controller;


use think\Controller;

class BaseLoginController extends Controller {
    //定义控制器初始化方法_initialize，在该控制器的方法调用之前首先执行。
    public function _initialize(){
        if(session('is_login')){
            return $this->redirect('Index/index');
        }
    }
}