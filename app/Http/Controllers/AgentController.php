<?php

namespace App\Http\Controllers;

use App\Admin\Cash;
use App\Admin\Order;
use App\Admin\User;
use Illuminate\Http\Request;

class AgentController extends CommomController
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
            $islogin = session('islogin');
            $lower = User::with('Realname', 'Cash')->where('top',$islogin->id)->get();


            $data = array();
            $datas = array();

            if(count($lower)>0){

                $User =  $this->getAgent($lower);

                foreach ($User as $v) {
                    $data['username'] = $v['username'];
                    $data['top'] = $v['top'];
                    $data['id'] = $v['id'];
                    $data['auth'] = $v['auth'];
                    $data['level'] = $v['level'];
                    $data['last_login_time'] = $v['last_login_time'];
                    $data['create_time'] = $v['create_time'];
                    $data['Realname'] = isset($v['Realname']) ? $v['Realname'] : '';
                    $data['code'] = isset($v['code']) ? $v['code'] : '';
                    $data['userZHIFUBAO'] = isset($v['userZHIFUBAO']) ? $v['userZHIFUBAO'] : '';
                    $data['tel'] = $v['tel'];

                    $datas[] = $v;
                }
            }else{
                $User='';
            }

            return view('agent_user')->with('data', $datas)->with('user',$User);
        }
    }
    public  function lower($id){
        $lower = User::where('top',$id)->get();
        $data = array();
        if($lower){
            $data =  $this->getAgent($lower);

        }
        return view('admin_agent_user_lower')->with('data',$data);


    }
    public function agentOrder(){
        $islogin = session('islogin');
        $lower = User::where('top',$islogin->id)->get();
        if($lower){
            $User =  $this->getAgent($lower);

        }
        $ids = array($islogin->id);
        foreach ($User as $v){
            $ids[] = $v['id'];
        }
        $order = Order::whereIn('uid',$ids)->orderby('id','DESC')->get();

        return view('agent_order')->with('data',$order);
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
    public function info($id){
        $user = User::where('id',$id)->first();
        if($user){
            return $user;
        }
    }
    public function bank($id){
        $cash = Cash::where('uid',$id)->first();

        if($cash){
            return $cash;
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
