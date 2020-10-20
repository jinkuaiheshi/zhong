<?php

namespace App\Http\Controllers;

use App\Admin\Cash;
use App\Admin\Order;
use App\Admin\User;
use Illuminate\Http\Request;

class UserController extends CommomController
{
    //
    public function index(Request $request)
    {
        if ($request->isMethod('POST')) {
            $id = $request['id'];
            $user = User::where('id',$id)->first();
            if($user){
                $user->auth = $request['auto'];
                if($user->update()){
                    return redirect(url()->previous())->with('message', '设置成功')->with('type','success')->withInput();
                }else{

                    return redirect(url()->previous())->with('message', '设置失败')->with('type','danger')->withInput();
                }
            }
        }else{
            $User = User::with('Realname', 'Cash')->where('id', '!=', 1)->get();

            return view('admin_user')->with('data', $User)->with('user',$User);
        }


    }
    public  function yongjin(){
        //查找所有的订单当前还生效的
        $order  = Order::where('status',2)->get();

        $data = array();
        $datas = array();
        if(count($order)>0){
            foreach ($order as $vv){
                if($vv->pid == 5){
                    if(strtotime('+3 month',strtotime($vv->force_time)) > time() ){

                        $user = User::where('id',$vv->uid)->first();
                        if($user->top != -1){
                            //上级用户
                            $top =User::where('id',$user->top)->first();
                            //查询用户等级
                            $flag = $this->getLevle($top->id);
                            if($flag== 2){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                            }
                            if($flag== 3){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                            }
                            if($flag== 4){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                            }
                            if($flag== 5){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                            }
                            $data['order'] = $vv->code;
                            $data['name'] = $vv->name;
                            $data['uid'] = $user->username;
                            $data['top'] = $top->username;
                            $data['topLevel'] = $flag;
                            $datas[] = $data;

                            if($top->top != -1){
                                //上上级
                                $toptop =User::where('id',$top->top)->first();

                                //查询用户等级
                                $flag = $this->getLevle($toptop->id);

                                if($flag== 2){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                                }
                                if($flag== 3){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                                }
                                if($flag== 4){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                                }
                                if($flag== 5){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                                }
                                $data['order'] = $vv->code;
                                $data['name'] = $vv->name;
                                $data['uid'] = $top->username;
                                $data['top'] = $toptop->username;
                                $data['topLevel'] = $flag;
                                $datas[] = $data;
                            }

                        }
                    }
                }
                if($vv->pid == 6){
                    if(strtotime('+6 month',strtotime($vv->force_time)) > time() ){

                        $user = User::where('id',$vv->uid)->first();
                        if($user->top != -1){
                            //上级用户
                            $top =User::where('id',$user->top)->first();
                            //查询用户等级
                            $flag = $this->getLevle($top->id);
                            if($flag== 2){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                            }
                            if($flag== 3){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                            }
                            if($flag== 4){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                            }
                            if($flag== 5){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                            }
                            $data['order'] = $vv->code;
                            $data['name'] = $vv->name;
                            $data['uid'] = $user->username;
                            $data['top'] = $top->username;
                            $data['topLevel'] = $flag;
                            $datas[] = $data;

                            if($top->top != -1){
                                //上上级
                                $toptop =User::where('id',$top->top)->first();

                                //查询用户等级
                                $flag = $this->getLevle($toptop->id);

                                if($flag== 2){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                                }
                                if($flag== 3){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                                }
                                if($flag== 4){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                                }
                                if($flag== 5){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                                }
                                $data['order'] = $vv->code;
                                $data['name'] = $vv->name;
                                $data['uid'] = $top->username;
                                $data['top'] = $toptop->username;
                                $data['topLevel'] = $flag;
                                $datas[] = $data;
                            }

                        }
                    }
                }
                if($vv->pid == 7){
                    if(strtotime('+12 month',strtotime($vv->force_time)) > time() ){
                        //确定购买人
                        $user = User::where('id',$vv->uid)->first();
                        if($user->top != -1){
                            //上级用户
                            $top =User::where('id',$user->top)->first();
                            //查询用户等级
                            $flag = $this->getLevle($top->id);
                            if($flag== 2){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                            }
                            if($flag== 3){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                            }
                            if($flag== 4){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                            }
                            if($flag== 5){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                            }
                            $data['order'] = $vv->code;
                            $data['name'] = $vv->name;
                            $data['uid'] = $user->username;
                            $data['top'] = $top->username;
                            $data['topLevel'] = $flag;
                            $datas[] = $data;

                            if($top->top != -1){
                                //上上级
                                $toptop =User::where('id',$top->top)->first();

                                //查询用户等级
                                $flag = $this->getLevle($toptop->id);

                                if($flag== 2){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                                }
                                if($flag== 3){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                                }
                                if($flag== 4){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                                }
                                if($flag== 5){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                                }
                                $data['order'] = $vv->code;
                                $data['name'] = $vv->name;
                                $data['uid'] = $top->username;
                                $data['top'] = $toptop->username;
                                $data['topLevel'] = $flag;
                                $datas[] = $data;
                            }

                        }


                    }
                }
                if($vv->pid == 8){
                    if(strtotime('+3 month',strtotime($vv->force_time)) > time() ){


                        $user = User::where('id',$vv->uid)->first();
                        if($user->top != -1){
                            //上级用户
                            $top =User::where('id',$user->top)->first();
                            //查询用户等级
                            $flag = $this->getLevle($top->id);
                            if($flag== 2){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                            }
                            if($flag== 3){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                            }
                            if($flag== 4){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                            }
                            if($flag== 5){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                            }
                            $data['order'] = $vv->code;
                            $data['name'] = $vv->name;
                            $data['uid'] = $user->username;
                            $data['top'] = $top->username;
                            $data['topLevel'] = $flag;
                            $datas[] = $data;

                            if($top->top != -1){
                                //上上级
                                $toptop =User::where('id',$top->top)->first();

                                //查询用户等级
                                $flag = $this->getLevle($toptop->id);

                                if($flag== 2){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                                }
                                if($flag== 3){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                                }
                                if($flag== 4){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                                }
                                if($flag== 5){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                                }
                                $data['order'] = $vv->code;
                                $data['name'] = $vv->name;
                                $data['uid'] = $top->username;
                                $data['top'] = $toptop->username;
                                $data['topLevel'] = $flag;
                                $datas[] = $data;
                            }

                        }
                    }
                }
                if($vv->pid == 9){
                    if(strtotime('+6 month',strtotime($vv->force_time)) > time() ){

                        $user = User::where('id',$vv->uid)->first();
                        if($user->top != -1){
                            //上级用户
                            $top =User::where('id',$user->top)->first();
                            //查询用户等级
                            $flag = $this->getLevle($top->id);
                            if($flag== 2){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                            }
                            if($flag== 3){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                            }
                            if($flag== 4){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                            }
                            if($flag== 5){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                            }
                            $data['order'] = $vv->code;
                            $data['name'] = $vv->name;
                            $data['uid'] = $user->username;
                            $data['top'] = $top->username;
                            $data['topLevel'] = $flag;
                            $datas[] = $data;

                            if($top->top != -1){
                                //上上级
                                $toptop =User::where('id',$top->top)->first();

                                //查询用户等级
                                $flag = $this->getLevle($toptop->id);

                                if($flag== 2){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                                }
                                if($flag== 3){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                                }
                                if($flag== 4){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                                }
                                if($flag== 5){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                                }
                                $data['order'] = $vv->code;
                                $data['name'] = $vv->name;
                                $data['uid'] = $top->username;
                                $data['top'] = $toptop->username;
                                $data['topLevel'] = $flag;
                                $datas[] = $data;
                            }

                        }
                    }
                }
                if($vv->pid == 10){
                    if(strtotime('+12 month',strtotime($vv->force_time)) > time() ){

                        $user = User::where('id',$vv->uid)->first();
                        if($user->top != -1){
                            //上级用户
                            $top =User::where('id',$user->top)->first();
                            //查询用户等级
                            $flag = $this->getLevle($top->id);
                            if($flag== 2){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                            }
                            if($flag== 3){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                            }
                            if($flag== 4){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                            }
                            if($flag== 5){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                            }
                            $data['order'] = $vv->code;
                            $data['name'] = $vv->name;
                            $data['uid'] = $user->username;
                            $data['top'] = $top->username;
                            $data['topLevel'] = $flag;
                            $datas[] = $data;

                            if($top->top != -1){
                                //上上级
                                $toptop =User::where('id',$top->top)->first();

                                //查询用户等级
                                $flag = $this->getLevle($toptop->id);

                                if($flag== 2){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                                }
                                if($flag== 3){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                                }
                                if($flag== 4){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                                }
                                if($flag== 5){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                                }
                                $data['order'] = $vv->code;
                                $data['name'] = $vv->name;
                                $data['uid'] = $top->username;
                                $data['top'] = $toptop->username;
                                $data['topLevel'] = $flag;
                                $datas[] = $data;
                            }

                        }
                    }
                }

                if($vv->pid == 16){
                    if(strtotime('+1 month',strtotime($vv->force_time)) > time() ){


                        $user = User::where('id',$vv->uid)->first();
                        if($user->top != -1){
                            //上级用户
                            $top =User::where('id',$user->top)->first();
                            //查询用户等级
                            $flag = $this->getLevle($top->id);
                            if($flag== 2){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                            }
                            if($flag== 3){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                            }
                            if($flag== 4){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                            }
                            if($flag== 5){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                            }
                            $data['order'] = $vv->code;
                            $data['name'] = $vv->name;
                            $data['uid'] = $user->username;
                            $data['top'] = $top->username;
                            $data['topLevel'] = $flag;
                            $datas[] = $data;

                            if($top->top != -1){
                                //上上级
                                $toptop =User::where('id',$top->top)->first();

                                //查询用户等级
                                $flag = $this->getLevle($toptop->id);

                                if($flag== 2){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                                }
                                if($flag== 3){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                                }
                                if($flag== 4){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                                }
                                if($flag== 5){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                                }
                                $data['order'] = $vv->code;
                                $data['name'] = $vv->name;
                                $data['uid'] = $top->username;
                                $data['top'] = $toptop->username;
                                $data['topLevel'] = $flag;
                                $datas[] = $data;
                            }

                        }
                    }
                }
                if($vv->pid == 18 || $vv->pid == 19){

                    $user = User::where('id',$vv->uid)->first();
                    if($user->top != -1){
                        //上级用户
                        $top =User::where('id',$user->top)->first();
                        //查询用户等级
                        $flag = $this->getLevle($top->id);
                        if($flag== 2){
                            $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                        }
                        if($flag== 3){
                            $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                        }
                        if($flag== 4){
                            $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                        }
                        if($flag== 5){
                            $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                        }
                        $data['order'] = $vv->code;
                        $data['name'] = $vv->name;
                        $data['uid'] = $user->username;
                        $data['top'] = $top->username;
                        $data['topLevel'] = $flag;
                        $datas[] = $data;

                        if($top->top != -1){
                            //上上级
                            $toptop =User::where('id',$top->top)->first();

                            //查询用户等级
                            $flag = $this->getLevle($toptop->id);

                            if($flag== 2){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                            }
                            if($flag== 3){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                            }
                            if($flag== 4){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                            }
                            if($flag== 5){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                            }
                            $data['order'] = $vv->code;
                            $data['name'] = $vv->name;
                            $data['uid'] = $top->username;
                            $data['top'] = $toptop->username;
                            $data['topLevel'] = $flag;
                            $datas[] = $data;
                        }

                    }


                }
                if($vv->pid == 22){
                    if(strtotime('+3 month',strtotime($vv->force_time)) > time() ){
                        $user = User::where('id',$vv->uid)->first();
                        if($user->top != -1){
                            //上级用户
                            $top =User::where('id',$user->top)->first();
                            //查询用户等级
                            $flag = $this->getLevle($top->id);
                            if($flag== 2){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                            }
                            if($flag== 3){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                            }
                            if($flag== 4){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                            }
                            if($flag== 5){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                            }
                            $data['order'] = $vv->code;
                            $data['name'] = $vv->name;
                            $data['uid'] = $user->username;
                            $data['top'] = $top->username;
                            $data['topLevel'] = $flag;
                            $datas[] = $data;

                            if($top->top != -1){
                                //上上级
                                $toptop =User::where('id',$top->top)->first();

                                //查询用户等级
                                $flag = $this->getLevle($toptop->id);

                                if($flag== 2){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                                }
                                if($flag== 3){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                                }
                                if($flag== 4){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                                }
                                if($flag== 5){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                                }
                                $data['order'] = $vv->code;
                                $data['name'] = $vv->name;
                                $data['uid'] = $top->username;
                                $data['top'] = $toptop->username;
                                $data['topLevel'] = $flag;
                                $datas[] = $data;
                            }

                        }


                    }
                }
                if($vv->pid == 23){
                    if(strtotime('+12 month',strtotime($vv->force_time)) > time() ){

                        $user = User::where('id',$vv->uid)->first();
                        if($user->top != -1){
                            //上级用户
                            $top =User::where('id',$user->top)->first();
                            //查询用户等级
                            $flag = $this->getLevle($top->id);
                            if($flag== 2){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                            }
                            if($flag== 3){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                            }
                            if($flag== 4){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                            }
                            if($flag== 5){
                                $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                            }
                            $data['order'] = $vv->code;
                            $data['name'] = $vv->name;
                            $data['uid'] = $user->username;
                            $data['top'] = $top->username;
                            $data['topLevel'] = $flag;
                            $datas[] = $data;

                            if($top->top != -1){
                                //上上级
                                $toptop =User::where('id',$top->top)->first();

                                //查询用户等级
                                $flag = $this->getLevle($toptop->id);

                                if($flag== 2){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.002;
                                }
                                if($flag== 3){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.003;
                                }
                                if($flag== 4){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.004;
                                }
                                if($flag== 5){
                                    $data['yongjin'] = $vv->UnitPrice*$vv->num*0.005;
                                }
                                $data['order'] = $vv->code;
                                $data['name'] = $vv->name;
                                $data['uid'] = $top->username;
                                $data['top'] = $toptop->username;
                                $data['topLevel'] = $flag;
                                $datas[] = $data;
                            }

                        }

                    }
                }


            }
            return view('admin_yongjin')->with('data', $datas);
        }
    }
    public function distribution($id){
        $user = User::with('Realname', 'Cash')->where('top',$id)->get();
        return view('admin_distribution')->with('data', $user);
    }
    public function info($id){
        $user = User::where('id',$id)->first();
        if($user){
            return $user;
        }
    }
    public function chakan($id){
        $user = User::where('id',$id)->first();
        $data = User::where('id',$user->top)->first();
        if($data){
            return $data;
        }
    }
    public function bank($id){
        $cash = Cash::where('uid',$id)->first();

        if($cash){
            return $cash;
        }
    }
    public function superior(Request $request){
        if ($request->isMethod('POST')) {
            $id = $request['aid'];
            $uid = $request['val'];
            $user = User::where('id',$uid)->first();//找到上级账号
            $local = User::where('id',$id)->first();
            $local->top = $user->id;
            if($local->update()){
                return redirect(url()->previous())->with('message', '设置成功')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '设置失败')->with('type','danger')->withInput();
            }

        }
    }
    public  function lower($id){
        $lower = User::where('top',$id)->get();
        $data = array();
        if($lower){
           $data =  $this->getAgent($lower);

        }
        return view('admin_user_lower')->with('data',$data);


    }
    public function invite($id){

            $user = User::where('id',$id)->first();
            if($user->invite >= 1){
                return $user;
            }else{

                $user->invite =rand('1000','9999');

                if($user->update()){
                    return $user;
                }
            }

    }
    public function cash(Request $request){
        if ($request->isMethod('POST')) {
            $cash = Cash::where('uid',$request['uid'])->first();
            if($cash){
                $cash->username = trim($request['username']);
                $cash->userZHIFUBAO = trim($request['userZHIFUBAO']);
                $cash->company = trim($request['company']);
                $cash->companyCode = trim($request['companyCode']);
                $cash->bank = trim($request['bank']);
                if($cash->update()){
                    return redirect(url()->previous())->with('message', '设置成功')->with('type','success')->withInput();
                }else{
                    return redirect(url()->previous())->with('message', '设置失败')->with('type','danger')->withInput();
                }
            }else{
                $cash = new Cash();
                $cash->username = trim($request['username']);
                $cash->userZHIFUBAO = trim($request['userZHIFUBAO']);
                $cash->company = trim($request['company']);
                $cash->companyCode = trim($request['companyCode']);
                $cash->bank = trim($request['bank']);
                $cash->uid = trim($request['uid']);
                if($cash->save()){
                    return redirect(url()->previous())->with('message', '设置成功')->with('type','success')->withInput();
                }else{
                    return redirect(url()->previous())->with('message', '设置失败')->with('type','danger')->withInput();
                }
            }
        }
    }
}
