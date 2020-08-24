<?php

namespace App\Http\Controllers;

use Aliyun\Core\AcsRequest;
use Aliyun\Core\AcsResponse;
use App\Admin\Article;
use App\Admin\Cash;
use App\Admin\Column;
use App\Admin\Kuaixun;
use App\Admin\Product;
use App\Admin\Realname;
use App\Admin\Sms;
use App\Admin\Upload;
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
use Storage;

class IndexController extends CommomController
{
    //
    public function index(){

        $startdate = strtotime("2018-7-15");
        $enddate = strtotime(date('Y-m-d'));
        $days= round(($enddate-$startdate)/3600/24) ;
        $arr = str_split($days);

        //整机合约
        $zhengji = Product::where('model',1)->get();
        //众筹模式
        $zhongchou = Product::where('model',2)->get();
        //算力模式
        $suanli = Product::where('model',3)->get();

        //矿机托管
        $tuoguan = Product::where('model',4)->get();

        $xinren = Product::where('model',5)->first();
        $special = Product::where('model',6)->first();

        if(session('btc')){
            $btc = session('btc') + sprintf("%.2f", 0.01 + mt_rand() / mt_getrandmax() * (0.05 - 0.01));
            session(['btc' => $btc]);
        }else{
            $btc = 580.62;
            $btc += sprintf("%.2f", 0.01 + mt_rand() / mt_getrandmax() * (0.05 - 0.01));
            session(['btc' => $btc]);
        }


        return view('index')->with('day',$arr)->with('zhengji',$zhengji)->with('zhongchou',$zhongchou)->with('suanli',$suanli)->with('tuoguan',$tuoguan)->with('xinren',$xinren)->with('special',$special);
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
    public function logout(){
        $islogin = session('indexlogin');
        if($islogin){
            session()->forget('indexlogin');
            return redirect('login')->with('message', '成功退出')->with('type','success')->withInput();
        }else{
            return redirect('login')->with('message', '您没有登入，无需退出')->with('type','danger');
        }
    }
    public function forget(Request $request){
        if ($request->isMethod('POST')) {
            $user = User::where('tel',$request['tel'])->first();
            if($user){
                $tel = $request['tel'];
                $code = $request['code'];
                $sms = Sms::where('phone',$tel)->where('sms_code',$code)->where('time','>=',time()-1800)->first();
                if($sms){
                    return redirect('forget/up'.'/'.$user->id);
                }
            }else{
                return redirect('register')->with('message', '账号不存在')->with('type','danger')->withInput();
            }
        }else{
            return view('forget');
        }

    }
    public function forgetUP($id){
        $user = User::where('id',$id)->first();
        return view('forgetPwd')->with('data',$user);
    }
    public  function forgetPwd( Request $request){
        if ($request->isMethod('POST')) {
            $user = User::where('id',$request['id'])->first();
            if($user){
                $password = $request['password'];
                $repassword = $request['repassword'];
                if($password === $repassword){
                    $user->suppwd =Crypt::encrypt($password);
                    if($user->update()){
                        session(['indexlogin' => $user]);
                        return redirect('index');
                    }else{

                        return redirect(url()->previous())->with('message', '重置失败')->with('type','danger')->withInput();
                    }
                }else{
                    return redirect(url()->previous())->with('message', '两次密码输入不一样')->with('type','danger')->withInput();
                }
            }
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

                    $user->top = $request['top'];

                    if($user->save()){
                        session(['indexlogin' => $user]);
                        return redirect('index');
                    }else{

                        return redirect(url()->previous())->with('message', '注册失败')->with('type','danger')->withInput();
                    }
                }else{

                    return redirect(url()->previous())->with('message', '验证码失败或者已经失效')->with('type','danger')->withInput();
                }
            }else{

                return redirect(url()->previous())->with('message', '两次密码输入不一样')->with('type','danger')->withInput();
            }

        }else{
            if($request->input('uid')){
                $uid = Crypt::decrypt($request->input('uid'));
                $user = User::where('tel',$uid)->first();
                $data = $user->id;
            }else{
                $data = -1;
            }
            return view('register')->with('data',$data);
        }
    }
    public function news(){
        $column = Column::All();
        $data = Article::take(5)->get();
        $imgs = array();

        foreach ($data as $v){

            preg_match_all("/<img.*\>/isU",$v->body,$ereg);
            $img=$ereg[0][0];
            $p="#src=('|\")(.*)('|\")#isU";
            preg_match_all ($p, $img, $img1);
            $img_path =$img1[2][0];
            $arr = array();
            $arr['title'] = $v->title;
            $arr['id'] = $v->id;
            if(str_contains($img_path, 'http://')){
                $arr['src'] = $img_path;
            }else{
                $arr['src'] ='http://www.zhongwaikuangye.com/'.$img_path;
            }
            $imgs[] = $arr;

        }
        $toutiao = Article::where('cid',1)->get();
        $toutiaos = array();
        foreach ($toutiao as $v){

            preg_match_all("/<img.*\>/isU",$v->body,$ereg);
            $img=$ereg[0][0];
            $p="#src=('|\")(.*)('|\")#isU";
            preg_match_all ($p, $img, $img1);
            $img_path =$img1[2][0];
            $arr = array();
            $arr['title'] = $v->title;
            $arr['hot'] = $v->hot;
            $arr['id'] = $v->id;
            $arr['created_time'] = $v->created_time;
            if(str_contains($img_path, 'http://')){
                $arr['src'] = $img_path;
            }else{
                $arr['src'] ='http://www.zhongwaikuangye.com/'.$img_path;
            }
            $toutiaos[] = $arr;
        }
        $artive2 = Article::where('cid',2)->get();
        $artive2s = array();
        foreach ($artive2 as $v){

            preg_match_all("/<img.*\>/isU",$v->body,$ereg);
            $img=$ereg[0][0];
            $p="#src=('|\")(.*)('|\")#isU";
            preg_match_all ($p, $img, $img1);
            $img_path =$img1[2][0];
            $arr = array();
            $arr['title'] = $v->title;
            $arr['hot'] = $v->hot;
            $arr['id'] = $v->id;
            $arr['created_time'] = $v->created_time;
            if(str_contains($img_path, 'http://')){
                $arr['src'] = $img_path;
            }else{
                $arr['src'] ='http://www.zhongwaikuangye.com/'.$img_path;
            }
            $artive2s[] = $arr;
        }
        $artive3 = Article::where('cid',3)->get();
        $artive3s = array();
        foreach ($artive3 as $v){

            preg_match_all("/<img.*\>/isU",$v->body,$ereg);
            $img=$ereg[0][0];
            $p="#src=('|\")(.*)('|\")#isU";
            preg_match_all ($p, $img, $img1);
            $img_path =$img1[2][0];
            $arr = array();
            $arr['title'] = $v->title;
            $arr['hot'] = $v->hot;
            $arr['id'] = $v->id;
            $arr['created_time'] = $v->created_time;
            if(str_contains($img_path, 'http://')){
                $arr['src'] = $img_path;
            }else{
                $arr['src'] ='http://www.zhongwaikuangye.com/'.$img_path;
            }
            $artive3s[] = $arr;
        }
        $kuaixun = Kuaixun::orderBy('id', 'DESC')->first();
        if(time() - $kuaixun->time >= 1800 ){
            $data = file_get_contents('https://www.528btc.com/bkuaixun/');

            preg_match('/id=\"showajaxnews\">([\s\S]*)class=\"MoreNews\"/Uis',$data,$body);

            preg_match_all('/target=\"_blank\">([\s\S]*)<\/a><\/span>/Uis', $body[0], $strArrk);
            preg_match_all('/<p>([\s\S]*)<\/p>\\r\\n/Uis', $body[0], $strbody);

            for ($i=1;$i<=10;$i++){
                $kuaixun = new  Kuaixun();
                $kuaixun->title = $strArrk[1][$i];
                $kuaixun->info = $strbody[1][$i];
                $kuaixun->time = time();
                $kuaixun->save();
            }
            $kuaixun = Kuaixun::orderBy('id', 'DESC')->take(5)->get();
        }else{
            $kuaixun = Kuaixun::orderBy('id', 'DESC')->take(5)->get();
        }




        return view('news')->with('column',$column)->with('img',$imgs)->with('toutiao',$toutiaos)->with('artive2',$artive2s)->with('artive3',$artive3s)->with('kuaixun',$kuaixun);
    }
    public function kuaixunMore(){
        $data = Kuaixun::paginate(20);
        return view('more',compact('data'));
    }
    public function article($id){
        $article = Article::where('id',$id)->first();
        $last = Article::where('id', '<', $article->id)->latest('id')->first();
        $next = Article::where('id', '>', $article->id)->orderBy('id', 'asc')->first();
        $paihang = Article::orderBy('hot', 'DESC')->take(5)->get();


        $paihangs = array();
        foreach ($paihang as $v){

            preg_match_all("/<img.*\>/isU",$v->body,$ereg);
            $img=$ereg[0][0];
            $p="#src=('|\")(.*)('|\")#isU";
            preg_match_all ($p, $img, $img1);
            $img_path =$img1[2][0];
            $arr = array();
            $arr['title'] = $v->title;
            $arr['hot'] = $v->hot;
            $arr['id'] = $v->id;
            $arr['created_time'] = $v->created_time;
            if(str_contains($img_path, 'http://')){
                $arr['src'] = $img_path;
            }else{
                $arr['src'] ='http://www.zhongwaikuangye.com/'.$img_path;
            }
            $paihangs[] = $arr;


        }
        return view('article')->with('data',$article)->with('last',$last)->with('next',$next)->with('paihang',$paihangs);
    }
    public function invite(){
        return view('invite');
    }

    public function gonglue(){
        return view('gonglue');
    }
    public function pingtai(){
        return view('pingtai');
    }
    public function contact(){
        return view('contact');
    }
    public function guanyu(){
        return view('guanyu');
    }
    public function info($id){
        $product = Product::where('id',$id)->first();
        return view('info')->with('product',$product);
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
    public function profile(){
        $indexlogin = session('indexlogin');
        return view('profile')->with('user',$indexlogin);
    }
    public function shiming(Request $request){
        if ($request->isMethod('POST')) {
                $name = $request['name'];
                $code= $request['code'];
                $indexlogin = session('indexlogin');
                $real = Realname::where('uid',$indexlogin->id)->first();
                if($real){
                    $real->name = $name;
                    $real->code = $code;
                   $real->update();
                }else{
                    $real = new Realname();
                    $real->name = $name;
                    $real->code = $code;
                    $real->uid = $indexlogin->id;
                    $real->created_time = date('Y-m-d H:i:s');
                    if($real->save()){
                        return redirect(url()->previous())->with('message', '操作成功')->with('type','success')->withInput();
                    };
                }
        }else{
            $indexlogin = session('indexlogin');
            $real = Realname::where('uid',$indexlogin->id)->first();
            return view('shiming')->with('data',$real);
        }
    }
    public function passwordEdit(Request $request){
        if ($request->isMethod('POST')) {
            $indexlogin = session('indexlogin');
            if($request['suppwd'] == Crypt::decrypt($indexlogin->suppwd)){
                if($request['password'] == $request['repassword']){
                    $user = User::where('id',$indexlogin->id)->first();
                    $user->suppwd =Crypt::encrypt($request['password']);
                    if($user->update()){
                        return redirect(url('profile'))->with('message', '更改成功')->with('type','success')->withInput();
                    }
                }else{
                    return redirect(url()->previous())->with('message', '新密码俩次不一致')->with('type','danger')->withInput();
                }
            }else{
                return redirect(url()->previous())->with('message', '原始密码错误')->with('type','danger')->withInput();
            }
        }else{
            return view('passwordEdit');
        }
    }
    public function cash(Request $request){
        if ($request->isMethod('POST')) {
            $username = $request['username'];
            $userZHIFUBAO= $request['userZHIFUBAO'];
            $indexlogin = session('indexlogin');
            $cash = Cash::where('uid',$indexlogin->id)->first();
            if($cash){
                $cash->username = $username;
                $cash->userZHIFUBAO = $userZHIFUBAO;
                $cash->update();

            }else{
                $cash = new Cash();
                $cash->username = $username;
                $cash->userZHIFUBAO = $userZHIFUBAO;
                $cash->uid = $indexlogin->id;

                if($cash->save()){
                    return redirect(url()->previous())->with('message', '操作成功')->with('type','success')->withInput();
                };
            }
        }else{
            $indexlogin = session('indexlogin');
            $cash = Cash::where('uid',$indexlogin->id)->first();
            return view('cash')->with('data',$cash);
        }
    }
    public function zhinan(){
        return view('zhinan');
    }
    public function shipin(){
        return view('shipin');
    }
    public function weixinPay(){
        return view('weixinPay');
    }
    //AliPay
    public function AliPay(){
        return view('AliPay');
    }

    public function YinlianPay(){
        return view('YinlianPay');
    }
    public function succ(){
        return view('succ');
    }
    public function upload(Request $request){
        if ($request->isMethod('POST')) {
            $pic = $request->file('pic');
            if ($pic->isValid()) {
                $ext = $pic->getClientOriginalExtension();
                $arr = array('jpg', 'png', 'gif', 'jpeg', 'bmp');
                if (!in_array($ext, $arr)) {
                    return redirect(url()->previous())->with('message', '上传文件不是图片类型')->with('type','danger')->withInput();
                }
                $path = $pic->getRealPath();
                $pic_path = 'pic_' . time() . '.' . $ext;
                Storage::disk('pic')->put($pic_path, file_get_contents($path));
                $indexlogin = session('indexlogin');

                $upload = new Upload();
                $upload -> created_time = date('Y-m-d H:i:s',time());
                $upload -> pic = $pic_path;
                $upload -> uid = $indexlogin->id;

                if($upload->save()){
                    return redirect(url('succ'))->with('message', '上传凭证成功')->with('type','success')->withInput();
                }else{
                    return redirect(url()->previous())->with('message', '上传凭证失败')->with('type','danger')->withInput();
                }
            }else{
                return redirect(url()->previous())->with('message', '上传文件失败或者已经损坏')->with('type','danger')->withInput();
            }
        }else{
            return view('upload');
        }
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
