<?php
/**
 * Created by PhpStorm.
 * User: zgr
 * Date: 2020/8/10
 * Time: 11:27
 */

namespace app\admin\controller;


class Index extends BaseController {

    public function index(){
        return $this->fetch('index');
    }
}