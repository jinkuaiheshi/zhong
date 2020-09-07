<?php

namespace App\Http\Controllers;

use App\Admin\Cash;
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
            $data = array();
            $datas = array();
            foreach ($User as $v) {
                $data['username'] = $v->username;
                $data['top'] = $v->top;
                $data['id'] = $v->id;
                $data['auth'] = $v->auth;
                $data['level'] = $v->level;
                $data['last_login_time'] = $v->last_login_time;
                $data['create_time'] = $v->create_time;
                $data['Realname'] = isset($v->Realname->name) ? $v->Realname->name : '';
                $data['code'] = isset($v->Realname->code) ? $v->Realname->code : '';
                $data['userZHIFUBAO'] = isset($v->cash->userZHIFUBAO) ? $v->cash->userZHIFUBAO : '';
                $data['tel'] = $v->tel;
                if ($v->top != -1) {
                    $top = User::where('id', $v->top)->first();
                    $data['topUser'] = $top->username;
                }
                $datas[] = $data;
            }
            $islogin = session('islogin');

            return view('admin_user')->with('data', $datas)->with('user',$User);
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
