<?php
/**
 * Created by PhpStorm.
 * User: zgr
 * Date: 2020/8/11
 * Time: 15:07
 */

namespace app\admin\model;

class SettingModel extends BaseModel {

    public function update_setting($params){
        if (empty($params)) {
            return false;
        }

        if (is_array($params)) {
            foreach ($params as $k => $v) {
                $tmp = [
                    'name' => $k,
                    'value' => $v
                ];
                \think\DB::name('setting')->update($tmp);
            }
            return true;
        } else {
            return false;
        }

    }

    public function setting_list(){
        $result = \think\DB::name('setting')->select();

        if(is_array($result)){
            $list_setting = array();
            foreach ($result as $k => $v){
                $list_setting[$v['name']] = $v['value'];
            }
        }

        return $list_setting;
    }
}