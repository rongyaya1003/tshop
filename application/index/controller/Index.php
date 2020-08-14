<?php
namespace app\index\controller;

use app\admin\Model\SettingModel as settingModel;

class Index extends BaseController {

    public function index(){
        $setting_model = new settingModel;
        $setting_list = $setting_model->setting_list();
        $this->assign('setting_list', $setting_list);
        return $this->fetch('index');
    }
}
