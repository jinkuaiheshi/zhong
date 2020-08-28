<?php

namespace App\Http\Controllers;

use App\Admin\User;
use Illuminate\Http\Request;
use Geetestlib;
use App\Http\Requests;

class CommomController extends Controller
{
    //

    public function apiVerif(Request $request){
        // 极验类的库，传入CAPTCHA_ID 和 PRIVATE_KEY
        // 在极验后台有，写到配置文件中去
        $CAPTCHA_ID = '49c0fa1612d0d2225a8869a79d08ba51';
        $PRIVATE_KEY ='ac7013b7e14130fdcbbb6da63f4cdb6f';
        $GtSdk = new \GeetestLib($CAPTCHA_ID, $PRIVATE_KEY);
        session_start();
        $data = array(
            "user_id" => 'test', # 网站用户id
            "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address" => "127.0.0.1", # 请在此处传输用户请求验证时所携带的IP
        );
        $status = $GtSdk->pre_process($data, 1); // 获取服务器的状态
        session(['gtserver' => $status]);// 状态存入session中
        session(['user_id' => $data['user_id']]);// 用户id存入session中
        echo $GtSdk->get_response_str(); // 传到前台 供initGeetest使用 data.gt, data.challenge, data.success


    }

        //递归无限级查询下属
    private  $datas;
    public function getAgent($lower){

            foreach ($lower as $vv){

                $data['id'] = $vv->id;
                $data['username'] = $vv->username;
                $data['last_login_time'] = $vv->last_login_time;
                $data['create_time'] = $vv->create_time;
                $data['auth'] = $vv->auth;
                $data['tel'] = $vv->tel;
                $data['level'] = $vv->level;

                $this->datas[] = $data;
                $lowers = User::where('top',$vv->id)->get();
                if($lowers){
                    $this->getAgent($lowers);
                }
            }
            return $this->datas;

    }
}
