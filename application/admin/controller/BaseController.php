<?php
/**
 * Created by PhpStorm.
 * User: zgr
 * Date: 2020/8/10
 * Time: 15:08
 */

namespace app\admin\controller;
use think\Controller;

class BaseController extends Controller{
    //定义控制器初始化方法_initialize，在该控制器的方法调用之前首先执行。
    public function _initialize(){
        if(!session('is_login')){
            return $this->error('请先登录系统',url('Login/login'));
        }

        $this->assign('admin_menu', $this->getAdminMunuList());
    }

    /**
     * 后台显示菜单
     *
     * @return array
     */
    protected function getAdminMunuList(){
        return $this->_getMenuList();
    }

    private function _getMenuList(){
        $menu_list = array(
            array('name' => '设置', 'child' => array(
                array('name' => '全局设置', 'url'=>'Setting/setting'),
                array('name' => '图片设置', 'url'=>'Upload/upload'),
            )),
            array('name' => '会员', 'child' => array(
                array('name' => '会员管理', 'url'=>'Member/member')
            )),
        );

        return $menu_list;
    }
}