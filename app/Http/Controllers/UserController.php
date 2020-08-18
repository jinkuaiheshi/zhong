<?php

namespace App\Http\Controllers;

use App\Admin\User;
use Illuminate\Http\Request;

class UserController extends CommomController
{
    //
    public function index()
    {
        $User = User::with('Realname', 'Cash')->where('id', '!=', 1)->get();
        $data = array();
        $datas = array();
        foreach ($User as $v) {
            $data['username'] = $v->username;
            $data['top'] = $v->top;
            $data['last_login_time'] = $v->last_login_time;
            $data['create_time'] = $v->create_time;
            $data['Realname'] = isset($v->Realname->name) ? $v->Realname->name : '';
            $data['userZHIFUBAO'] = isset($v->cash->userZHIFUBAO) ? $v->cash->userZHIFUBAO : '';
            $data['tel'] = $v->tel;
            if ($v->top != -1) {
                $top = User::where('id', $v->top)->first();
                $data['topUser'] = $top->username;
            }
            $datas[] = $data;


        }
        return view('admin_user')->with('data', $datas);

    }
    public function distribution($id){
        $user = User::with('Realname', 'Cash')->where('top',$id)->get();
        return view('admin_distribution')->with('data', $user);
    }
}
