<?php
/**
 * Created by PhpStorm.
 * User: zgr
 * Date: 2020/8/11
 * Time: 14:13
 */

namespace app\admin\controller;

use app\admin\model\SettingModel as settingModel;

class Setting extends BaseController {

    public function setting(){
        $setting_model = new settingModel;
        if (request()->isPost()) {
            $params = array(
                'site_name' => input('site_name'),
                'icp_number' => input('icp_number'),
                'site_email' => input('site_email'),
                'site_phone' => input('site_phone'),
                'site_address' => input('site_address'),
                'contact_name' => input('contact_name'),
                'flow_code' => input('flow_code'),
                'about_us' => request()->post('about_us')
            );

            $result = $setting_model->update_setting($params);
            if ($result) {
                return $this->success('成功设置','Setting/setting');
            } else {
                return $this->error('设置错误','Setting/setting');
            }
        }

        $setting_list = $setting_model->setting_list();
        $this->assign('setting_list', $setting_list);
        return $this->fetch('setting');
    }
}