<?php

namespace App\Http\Controllers;

use Aliyun\Core\AcsRequest;
use Aliyun\Core\AcsResponse;
use App\Admin\Column;
use App\Admin\Product;
use App\Admin\Sms;
use App\Admin\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;

use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;
use Aliyun\Core\Regions\EndpointConfig;


class IndexController extends CommomController
{
    //
    public function index(){

        $startdate = strtotime("2013-3-15");
        $enddate = strtotime(date('Y-m-d'));
        $days= round(($enddate-$startdate)/3600/24) ;
        $arr = str_split($days);

        //整机合约
        $zhengji = Product::where('model',1)->get();
        //众筹模式
        $zhongchou = Product::where('model',2)->get();

        return view('index')->with('day',$arr)->with('zhengji',$zhengji)->with('zhongchou',$zhongchou);
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
    public function register(Request $request){
        if ($request->isMethod('POST')) {
            $user = User::where('tel',$request['tel'])->first();
            if($user){
                return redirect('register')->with('message', '账号已经存在')->with('type','danger')->withInput();
            }
            $password = $request['password'];
            $repassword = $request['repassword'];
            if($password === $repassword){
                $tel = $request['tel'];
                $code = $request['code'];
                $sms = Sms::where('phone',$tel)->where('sms_code',$code)->where('time','>=',time()-1800)->first();
                if($sms){
                    $user = new User();
                    $user->tel =$tel;
                    $user->create_time = date('Y-m-d H:i:s', time());
                    $user->username = $tel;
                    $user->last_login_time = date('Y-m-d H:i:s', time());
                    $user->suppwd =Crypt::encrypt($password);
                    $user->auth = 3;
                    $user->invite = $request['invite'];
                    if($user->save()){
                        session(['indexlogin' => $user]);
                        return redirect('index');
                    }else{

                        return redirect('register')->with('message', '注册失败')->with('type','danger')->withInput();
                    }
                }else{

                    return redirect('register')->with('message', '验证码失败或者已经失效')->with('type','danger')->withInput();
                }
            }else{

                return redirect('register')->with('message', '两次密码输入不一样')->with('type','danger')->withInput();
            }

        }else{

            return view('register');
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
    public function send(Request $request){
        //header('Content-Type: text/plain; charset=utf-8');
        $phone = $request['phone'];

        $code = rand(0000,9999);
        $request = new SendSmsRequest();
        $request->setPhoneNumbers($phone);
        $request->setSignName("中外矿业");
        $request->setTemplateCode("SMS_197165041");
        $request->setTemplateParam(json_encode(array(  // 短信模板中字段的值
            "code"=>$code
        ), JSON_UNESCAPED_UNICODE));

        $acsResponse = static::getAcsClient()->getAcsResponse($request);

        if($acsResponse->Code == 'OK' && $acsResponse->Message == 'OK'){

            $sms = new Sms();
            $sms->phone = $phone;
            $sms->Message = $acsResponse->Message;
            $sms->RequestId = $acsResponse->RequestId;
            $sms->Code = $acsResponse->Code;
            $sms->sms_code = $code;
            $sms->time = time();
            if($sms->save()){
               // return redirect('register')->with('message', $acsResponse->Message)->with('type','success')->withInput();
                $str = '';
                $str .= '<div id='.'"toast-container"'.' class='.'"toast-top-right"'.' aria-live='.'"polite"'.' role='.'"alert"'.'><div class='.'"toast toast-success"'.' style='.'"display: block;"'.'><div class='.'"toast-message"'.'>'.$acsResponse->Message.'</div></div></div>';
                return $str;
            }
        }else{
            $str2 = '';
            $str2 .= '<div id='.'"toast-container"'.' class='.'"toast-top-right"'.' aria-live='.'"polite"'.' role='.'"alert"'.'><div class='.'"toast toast-danger"'.' style='.'"display: block;"'.'><div class='.'"toast-message"'.'>'.$acsResponse->Message.'</div></div></div>';
            return $str2;

           // return redirect('register')->with('message', $acsResponse->Message)->with('type','danger')->withInput();
        }


    }
    static $acsClient = null;
    public static function getAcsClient() {
        //产品名称:云通信短信服务API产品,开发者无需替换
        $product = "Dysmsapi";

        //产品域名,开发者无需替换
        $domain = "dysmsapi.aliyuncs.com";

        // TODO 此处需要替换成开发者自己的AK (https://ak-console.aliyun.com/)
        $accessKeyId = "LTAI4G9xwK3K8vg53yyaxbQt"; // AccessKeyId

        $accessKeySecret = "WA3pBI12zg9TtRK79EgWPsnAsy1f7v"; // AccessKeySecret

        // 暂时不支持多Region
        $region = "cn-hangzhou";

        // 服务结点
        $endPointName = "cn-hangzhou";


        if(static::$acsClient == null) {

            //初始化acsClient,暂不支持region化
            $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);

            EndpointConfig::load();

            // 增加服务结点
            DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);

            // 初始化AcsClient用于发起请求
            static::$acsClient = new DefaultAcsClient($profile);
        }
        return static::$acsClient;
    }

}
