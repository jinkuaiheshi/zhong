<?php

namespace App\Http\Controllers;

use App\Admin\Column;
use App\Admin\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;

class IndexController extends CommomController
{
    //
    public function index(){

        $startdate = strtotime("2013-3-15");
        $enddate = strtotime(date('Y-m-d'));
        $days= round(($enddate-$startdate)/3600/24) ;
        $arr = str_split($days);
        return view('index')->with('day',$arr);
    }

    public function login(Request $request){
        if ($request->isMethod('POST')) {

            $user = User::where('tel', trim($request['tel']))->first();

            if($user){

                if (Crypt::decrypt($user->suppwd) === $request['password']) {
                    //写入session

                    $user->last_login_time = date('Y-m-d H:i:s', time());

                    if($user->update()){
                        session(['indexlogin' => $user]);
                        return redirect('index');
                    }
                } else {
                    return redirect('login')->with('message', '密码错误，请重新输入!')->withInput();
                }
            }else {
                return redirect('login')->with('message', '手机号不存在或者密码错误')->withInput();
            }
        }else{

            return view('login');
        }
    }
    public function news(){
        $column = Column::All();
        return view('news')->with('column',$column);
    }
    public function article(){
        return view('article');
    }
    public function invite(){
        return view('invite');
    }
    public function gonglue(){
        return view('gonglue');
    }
    public function share(Request $request){

        $indexlogin = session('indexlogin');
        ob_start();
        $qrcode = new \QRcode();//声明qrcode类

        $url = url('/register?uid=').Crypt::encrypt($indexlogin->tel);//要转成二维码的url地址
        //$url = 'www.baidu.com';//要转成二维码的url地址

        $errorLevel = "L";//容错率

        $size = "4";//生成图片大小

       $qrcode::png($url, false, $errorLevel, $size,2);

        $imgstr = base64_encode(ob_get_contents());
        ob_end_clean();

        $falg = 'data:image/png;base64,';
        return view('share')->with('png',$falg.$imgstr);



    }
    public function personal(){
        $indexlogin = session('indexlogin');
        return view('personal')->with('user',$indexlogin);
    }
}
