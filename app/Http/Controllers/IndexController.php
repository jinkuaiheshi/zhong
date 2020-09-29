<?php

namespace App\Http\Controllers;

use Aliyun\Core\AcsRequest;
use Aliyun\Core\AcsResponse;
use App\Admin\Article;
use App\Admin\Cash;
use App\Admin\Column;
use App\Admin\Huazhuan;
use App\Admin\Kuaixun;
use App\Admin\Order;
use App\Admin\Product;
use App\Admin\Realname;
use App\Admin\Sms;
use App\Admin\Tibi;
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
                return redirect(url()->previous())->with('message', '账号已经存在')->with('type','danger')->withInput();
            }
            $isInvite = User::where('invite',trim($request['invite']))->first();
            if(!$isInvite){
                return redirect(url()->previous())->with('message', '邀请码不存在')->with('type','danger')->withInput();
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
                    $user->invite = trim($request['invite']);
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
                $invite = $user->invite;

            }else{
                $data = -1;
                $invite = '';
            }
            return view('register')->with('data',$data)->with('invite',$invite);
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
        //$btc = Order::where('uid',$indexlogin->id)->get();
        $btc = Order::where('uid',$indexlogin->id)->where('status',2)->whereIn('pid',array(16,18))->get();
        //$btc = Order::where('uid',9)->where('status',2)->where('pid',16)->get();
        $num = 0;
        $hetong = 0;
        if(count($btc)>0){
            foreach ($btc as $v){
                $time = (time() - strtotime($v->force_time))/ 86400;
                if($v->pid ==16 ){
                    if($time<=30){
                        $num+=floor($time)*0.00000803;
                    }else{
                        $time = 30;
                        $num+=floor($time)*0.00000803;
                    }
                }else{
                    $num+=floor($time)*0.0008833;
                }

                if($v->pid != 18){
                    $hetong+=$v->UnitPrice;
                }
            }
        }

        $hetong_btc = $hetong;
        //BTC总资产 / 可用资产 还需要减去划转 跟 提币扣掉的
        $tibi_btc = Tibi::where('uid',$indexlogin->id)->where('status','<=',2)->where('type',1)->get();
        $tibi_num = 0;
        if(count($tibi_btc)>0){
            foreach ($tibi_btc as $v){
                $tibi_num+=$v->num;
            }
        }
        $huazhuan_btc = Huazhuan::where('uid',$indexlogin->id)->where('status','<=',2)->where('type','BTC')->get();
        $huazhuan_num = 0;
        if(count($huazhuan_btc)>0){
            foreach ($huazhuan_btc as $v){
                $huazhuan_num+=$v->num;
            }
        }
        $data_btc = $num - $tibi_num - $huazhuan_num;

        $eth = Order::where('uid',$indexlogin->id)->where('status',2)->whereIn('pid',array(17,19))->get();
       // $eth = Order::where('uid',9)->where('status',2)->where('pid',17)->get();
        $num_eth = 0;
        $hetong2 = 0;
        if(count($eth)>0){
            foreach ($eth as $v){
                $time = (time() - strtotime($v->force_time))/ 86400;
                if($v->pid ==17 ){
                    if($time<=30){
                        $num_eth+=floor($time)*0.00067;
                    }else{
                        $time = 30;
                        $num_eth+=floor($time)*0.00067;
                    }
                }else{
                    $num_eth+=floor($time)*0.0268;
                }


                if($v->pid != 19){
                    $hetong2+=$v->UnitPrice;
                }

            }
        }
        $hetong_eth = $hetong2;

        $tibi_eth = Tibi::where('uid',$indexlogin->id)->where('status','<=',2)->where('type',2)->get();
        $tibi_eth_num = 0;
        if(count($tibi_eth)>0){
            foreach ($tibi_eth as $v){
                $tibi_eth_num+=$v->num;
            }
        }
        $huazhuan_eth = Huazhuan::where('uid',$indexlogin->id)->where('status','<=',2)->where('type','ETH')->get();
        $huazhuan_eth_num = 0;
        if(count($huazhuan_eth)>0){
            foreach ($huazhuan_eth as $v){
                $huazhuan_eth_num+=$v->num;
            }
        }
        $data_eth = $num_eth - $tibi_eth_num - $huazhuan_eth_num;
        //$cny = 0;
        //$cny =  Order::where('uid',$indexlogin->id)->where('status',2)->whereIn('pid',array(17,19))->get();
        $cny = Order::where('uid',$indexlogin->id)->where('status',2)->whereIn('pid',array(5,6,7,8,9,10,22,23))->get();
        $num = 0;

        if(count($cny)>0){
            foreach ($cny as $v){
                if($v->pid== 22 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*100;
                }
                if($v->pid== 23 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*462*$v->num;
                }
                if($v->pid== 5 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*420*$v->num;
                }
                if($v->pid== 6 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*441*$v->num;
                }
                if($v->pid== 7 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*462*$v->num;
                }
                if($v->pid== 8 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*31.5*$v->num;
                }
                if($v->pid== 9 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*37.8*$v->num;
                }
                if($v->pid== 10 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*42*$v->num;
                }

            }
        }
        $data_cny = $num;

        //可用CNY
        $end = date('Y-m-d',strtotime ( "-1 month" ));
        $num_keyong = 0;
        $jiedong = 0;
        $keyong = Order::where('uid',$indexlogin->id)->where('status',2)->whereIn('pid',array(6,7,8,9,10,5,22,23,16,17))->whereDate('force_time','<=',$end)->get();
        if(count($keyong)>0){
            foreach ($keyong as $v){
                if($v->pid== 22 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    if($time>3){
                        $time = 3;
                        $jiedong += $v->UnitPrice*$v->num;
                    }
                    $num_keyong+=floor($time)*100;
                }
                if($v->pid== 23 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    if($time>12){
                        $time = 12;
                        $jiedong += $v->UnitPrice*$v->num;
                    }
                    $num_keyong+=floor($time)*462*$v->num;
                }
                if($v->pid== 5 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    if($time>3){
                        $time = 3;
                        $jiedong += $v->UnitPrice*$v->num;
                    }
                    $num_keyong+=floor($time)*420*$v->num;
                }
                if($v->pid== 6 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    if($time>6){
                        $time = 6;
                        $jiedong += $v->UnitPrice*$v->num;
                    }
                    $num_keyong+=floor($time)*441*$v->num;
                }
                if($v->pid== 7 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    if($time>12){
                        $time = 12;
                        $jiedong += $v->UnitPrice*$v->num;
                    }
                    $num_keyong+=floor($time)*462*$v->num;
                }
                if($v->pid== 8 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    if($time>3){
                        $time = 3;
                        $jiedong += $v->UnitPrice*$v->num;
                    }
                    $num_keyong+=floor($time)*31.5*$v->num;
                }
                if($v->pid== 9 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    if($time>6){
                        $time = 6;
                        $jiedong += $v->UnitPrice*$v->num;
                    }
                    $num_keyong+=floor($time)*37.8*$v->num;
                }
                if($v->pid== 10 ){

                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    if($time>12){
                        $time = 12;
                        $jiedong += $v->UnitPrice*$v->num;
                    }
                    $num_keyong+=floor($time)*42*$v->num;
                }
            }
        }
        //划转进来的钱
        $huazhuan_cny = 0;
        $huazhuan = Huazhuan::where('uid',$indexlogin->id)->where('status',2)->get();
        if(count($huazhuan)>0){
            foreach ($huazhuan as $v){
                $huazhuan_cny+=number_format($v->num*$v->bijia,2,'.','');
            }
        }
        //提取的钱
        $tibi_cny = Tibi::where('uid',$indexlogin->id)->where('status',2)->where('type',3)->get();
        $tiqu = 0;
        if(count($tibi_cny)>0){
            foreach ($tibi_cny as $v){
                $tiqu+=number_format($v->num,2,'.','');
            }
        }
        $num_keyong = $num_keyong + $jiedong + $huazhuan_cny - $tiqu;
        //总资产
        $todel=0;
        $todel_zichan = Order::where('uid',$indexlogin->id)->where('status',2)->get();
        //dd(strtotime("+1 month",strtotime('2020-09-09')));
        if(count($todel_zichan)>0){
            foreach ($todel_zichan as $v){

                if($v->pid != 19 && $v->pid != 18){
                    if($v->pid == 5 ){

                        if(strtotime('+3 month',strtotime($v->force_time)) > time() ){

                            $todel += $v->UnitPrice;
                        }
                    }
                    if($v->pid == 6 ){

                        if(strtotime('+6 month',strtotime($v->force_time)) >time() ){
                            $todel += $v->UnitPrice;
                        }
                    }
                    if($v->pid == 7 ){

                        if(strtotime('+12 month',strtotime($v->force_time)) >time() ){
                            $todel += $v->UnitPrice;
                        }
                    }
                    if($v->pid == 8 ){

                        if(strtotime('+3 month',strtotime($v->force_time)) >time() ){
                            $todel += $v->UnitPrice;
                        }
                    }
                    if($v->pid == 9 ){

                        if(strtotime('+6 month',strtotime($v->force_time)) >time() ){
                            $todel += $v->UnitPrice;
                        }
                    }
                    if($v->pid == 10 ){

                        if(strtotime('+12 month',strtotime($v->force_time)) >time() ){
                            $todel += $v->UnitPrice;
                        }
                    }
                    if($v->pid == 22 ){

                        if(strtotime('+3 month',strtotime($v->force_time)) >time() ){
                            $todel += $v->UnitPrice;
                        }
                    }
                    if($v->pid == 23){

                        if(strtotime('+12 month',strtotime($v->force_time)) >time() ){
                            $todel += $v->UnitPrice;
                        }
                    }
                }

            }
        }
        //减去提取出来的钱
        //$tiqu = Tibi::where('status',)->get();
//        $ch = curl_init();
//        curl_setopt($ch,CURLOPT_URL, 'https://otc-api.eiijo.cn/v1/data/config/purchase-price?coinId=1&currencyId=1&matchType=0');
//        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//        curl_setopt($ch,CURLOPT_HEADER,0);
//        curl_setopt($ch, CURLOPT_TIMEOUT,60);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
//        curl_setopt ($ch, CURLOPT_HTTPHEADER, [
//            "Content-Type: application/json",
//        ]);
//        $output = curl_exec($ch);
//        $info = curl_getinfo($ch);
//        curl_close($ch);
//        dd($output);

        return view('personal')->with('user',$indexlogin)->with('btc',$data_btc)->with('eth',$data_eth)->with('cny',$data_cny)->with('hetong_btc',$hetong_btc)->with('hetong_eth',$hetong_eth)->with('keyong',$num_keyong)->with('todel',$todel);
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
        $indexlogin = session('indexlogin');
        $data = Order::where('uid',$indexlogin->id)->take(1)->orderBy('id','desc')->first();
        return view('weixinPay')->with('data',$data);
    }
    //AliPay
    public function AliPay(){
        $indexlogin = session('indexlogin');
        $data = Order::where('uid',$indexlogin->id)->take(1)->orderBy('id','desc')->first();
        return view('AliPay')->with('data',$data);
    }

    public function YinlianPay()
    {
        $indexlogin = session('indexlogin');
        $data = Order::where('uid', $indexlogin->id)->take(1)->orderBy('id', 'desc')->first();
        return view('YinlianPay')->with('data', $data);
    }
    public function succ(){
        return view('succ');
    }
    public function team(){
        $indexlogin = session('indexlogin');
        $lower = User::where('top',$indexlogin->id)->get();


        $data = array();
        $datas = array();

        if(count($lower)>0){

            $User =  $this->getAgent($lower);

            foreach ($User as $v) {
//                $data['username'] = $v['username'];
//                $data['id'] = $v['id'];
//                $data['auth'] = $v['auth'];
//                $data['level'] = $v['level'];
//                $data['last_login_time'] = $v['last_login_time'];
//                $data['create_time'] = $v['create_time'];
//                $data['tel'] = $v['tel'];

                $datas[] = $v;
            }
        }else{
            $User='';
        }
        return view('team')->with('data', $datas);
    }
    public function huazhuan(){
        $data_btc = $this ->GetMySuoyouBtc();
        return view('huazhuan')->with('btc',$data_btc);
    }
    public function huazhuanEth(){
        //计算资产
        $num = $this->GetMySuoyouEth();
        return view('huazhuanEth')->with('eth',$num);
    }
    public function huazhuanCny(){
        //计算资产
        $indexlogin = session('indexlogin');
        //$btc = Order::where('uid',$indexlogin->id)->get();
        $cny = Order::where('uid',$indexlogin->id)->where('status',2)->whereIn('pid',array(5,6,7,8,9,10,22,23))->get();
        //$btc = Order::where('uid',9)->where('status',2)->where('pid',16)->get();
        $num = 0;

        if(count($cny)>0){
            foreach ($cny as $v){
                if($v->pid== 22 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*100;
                }
                if($v->pid== 23 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*462*$v->num;
                }
                if($v->pid== 5 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*420*$v->num;
                }
                if($v->pid== 6 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*441*$v->num;
                }
                if($v->pid== 7 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*462*$v->num;
                }
                if($v->pid== 8 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*31.5*$v->num;
                }
                if($v->pid== 9 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*37.8*$v->num;
                }
                if($v->pid== 10 ){
                    $time = (time() - strtotime($v->force_time))/ 2592000;
                    $num+=floor($time)*42*$v->num;
                }

            }
        }
        $data_cny = $num;
        return view('huazhuanCny')->with('cny',$data_cny);
    }
    public function getBTC(){
        $indexlogin = session('indexlogin');
        $cash = Cash::where('uid',$indexlogin->id)->first();
        if($cash){
            $btc = $this->GetMySuoyouBtc();
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, 'https://otc-api.eiijo.cn/v1/data/config/purchase-price?coinId=1&currencyId=1&matchType=0');
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_TIMEOUT,60);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt ($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
        ]);
        $output = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

            return view('getBTC')->with('btc',$btc)->with('bijia',json_decode($output)->data->price);
        }else{
            return view('goCash');

        }

    }
    public function getETH(){
        $indexlogin = session('indexlogin');
        $cash = Cash::where('uid',$indexlogin->id)->first();
        if($cash){
            $eth = $this->GetMySuoyouEth();
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, 'https://otc-api.eiijo.cn/v1/data/config/purchase-price?coinId=3&currencyId=1&matchType=0');
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_HEADER,0);
            curl_setopt($ch, CURLOPT_TIMEOUT,60);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt ($ch, CURLOPT_HTTPHEADER, [
                "Content-Type: application/json",
            ]);
            $output = curl_exec($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);
            return view('getETH')->with('eth',$eth)->with('bijia',json_decode($output)->data->price);;
        }else{
            return view('goCash');

        }

    }
    public  function tibi(Request $request){
        if ($request->isMethod('POST')) {

            $num = trim($request['num']);
            if($request['type'] == 3){
                $url = '';
            }else{
                $url = trim($request['url']);
            }
            $tibi = new Tibi();
            $tibi->url = $url;
            $tibi->num = $num;
            $tibi->type = trim($request['type']);
            $tibi->created_time = date('Y-m-d H:i:s',time());
            $tibi->uid = trim($request['uid']);
            $tibi->info = trim($request['info']);
            if($tibi->save()){
                return redirect(url()->previous())->with('message', '提币请求已经提交，等待审核')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '提币请求发起失败')->with('type','danger')->withInput();
            }

        }
    }
    public function transfer(Request $request){
        if ($request->isMethod('POST')) {
            $num = trim($request['num']);
            $transfer = new Huazhuan();
            $transfer->num = $num;

            $transfer->type = trim($request['type']);
            $transfer->created_time = date('Y-m-d H:i:s',time());
            $transfer->uid = trim($request['uid']);
            $transfer->bijia = trim($request['bijia']);
            if($transfer->save()){
                return redirect(url()->previous())->with('message', '划转请求已经提交，等待审核')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '划转请求发起失败')->with('type','danger')->withInput();
            }
        }
    }
    public function btc_mingxi(){
        $indexlogin = session('indexlogin');
        //订单收益BTC
        $order = Order::where('uid',$indexlogin->id)->where('status',2)->whereIn('pid',array(16,18))->get();
        $data = array();
        $datas = array();
        if(count($order)>0){
            foreach ($order as $v){
                $time = (time() - strtotime($v->force_time))/ 86400;

                if($v->pid == 18){

                    $data['shouyi'] = number_format(floor($time) * 0.0008833,8,'.','');
                }else{
                    if($time >= 30){
                        $time = 30;
                    }
                    $data['shouyi'] = number_format(floor($time)*0.00000803,8,'.','');
                }


                $data['name'] = $v->name;
                $data['code'] = $v->code;
                $data['TotalPrice'] = $v->TotalPrice;
                $data['force_time'] = $v->force_time;
                $datas[] = $data;
            }
        }
        //提币消耗
        $tibi = Tibi::where('uid',$indexlogin->id)->where('status',2)->where('type',1)->get();

        //划转消耗
        $huazhuan = Huazhuan::where('uid',$indexlogin->id)->where('status',2)->where('type','BTC')->get();


        return view('btc_mingxi')->with('data',$datas)->with('tibi',$tibi)->with('huazhuan',$huazhuan);
    }
    public function eth_mingxi(){
        $indexlogin = session('indexlogin');
        //订单收益BTC
        $order = Order::where('uid',$indexlogin->id)->where('status',2)->whereIn('pid',array(17,19))->get();
        $data = array();
        $datas = array();
        if(count($order)>0){
            foreach ($order as $v){
                $time = (time() - strtotime($v->force_time))/ 86400;
                if($v->pid ==19){
                    $data['shouyi'] = number_format(floor($time)*0.0268,5,'.','');
                }else{
                    $data['shouyi'] = number_format(floor($time)*0.00067,5,'.','');
                }

                $data['name'] = $v->name;
                $data['code'] = $v->code;
                $data['TotalPrice'] = $v->TotalPrice;
                $data['force_time'] = $v->force_time;
                $datas[] = $data;
            }
        }
        //提币消耗
        $tibi = Tibi::where('uid',$indexlogin->id)->where('status',2)->where('type',2)->get();

        //划转消耗
        $huazhuan = Huazhuan::where('uid',$indexlogin->id)->where('status',2)->where('type','ETH')->get();

        return view('eth_mingxi')->with('data',$datas)->with('tibi',$tibi)->with('huazhuan',$huazhuan);
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
