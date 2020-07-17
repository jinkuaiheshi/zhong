<?php

namespace App\Http\Controllers;

use App\Admin\Article;
use App\Admin\Column;
use App\Admin\User;
use Illuminate\Http\Request;
use Crypt;
use App\Http\Requests;


class AdminController extends CommomController
{
    //
    public function login(Request $request){
        if ($request->isMethod('POST')) {

            $user = User::where('username', trim($request['username']))->first();

            if($user){

                if (Crypt::decrypt($user->suppwd) === $request['password']) {
                    //写入session

                    $user->last_login_time = date('Y-m-d H:i:s', time());

                    if($user->update()){
                        session(['islogin' => $user]);
                        return redirect('/admin/sys/index');
                    }
                } else {
                    return redirect('/admin/sys/login')->with('message', '密码错误，请重新输入!')->withInput();
                }
            }else {
                return redirect('/admin/sys/login')->with('message', '用户名不存在或者密码错误')->withInput();
            }
        }else{

            return view('admin_sys_login');
        }

    }
    public function index(){
        return view('admin_sys_index');
    }
    public function column(){
        $data = Column::All();
        return view('admin_sys_column')->with('data',$data);
    }
    public function column_add(Request $request){
        if ($request->isMethod('POST')) {
            $name = $request['name'];
            $column = Column::where('name',$name)->first();
            if($column){
                return redirect(url()->previous())->with('message', '栏目已经存在，无法继续添加')->with('type','danger')->withInput();
            }else{
                $column = new Column();
                $column->name = $name;
                $column -> created_time = date('Y-m-d H:i:s',time());
                $column -> last_update_time = date('Y-m-d H:i:s',time());
                if($column->save()){
                    return redirect(url()->previous())->with('message', '栏目添加成功')->with('type','success')->withInput();
                }else{
                    return redirect(url()->previous())->with('message', '栏目添加失败')->with('type','danger')->withInput();
                }
            }
        }else{
            return view('admin_sys_column');
        }
    }
    public function columnID($id){
        if($id){
            $article = Article::where('cid',$id)->get();
            return view('admin_sys_article')->with('article',$article);
        }
    }
    public function article($id){
        if($id){
            $article = Article::where('id',$id)->first();
            return view('admin_sys_article_edit')->with('article',$article);
        }
    }
    public function articleUp(Request $request){
        if ($request->isMethod('POST')) {
            $id = $request['id'];
            $article = Article::where('id',$id)->first();
            $article->title = $request['title'];
            $article->source = $request['source'];
            $article->publisher = $request['publisher'];
            $article->body = $request['body'];
            if($article->update()){
                return redirect('admin/sys/column/'.$article->cid)->with('message', '文章编辑成功')->with('type','success')->withInput();
            }else{
                return redirect('admin/sys/column/'.$article->cid)->with('message', '文章编辑失败')->with('type','danger')->withInput();
            }
        }
    }
    public  function columnEdit($id){
        if($id){
            $article = Column::where('id',$id)->first();
            return  $article;
        }
    }
    public function columnUp(Request $request)
    {
        if ($request->isMethod('POST')) {
            $name = $request['name'];
            $column = Column::where('name',$name)->first();
            if($column){
                return redirect(url()->previous())->with('message', '栏目已经存在，无法修改')->with('type','danger')->withInput();
            }else{
                $column = Column::where('id',$request['id'])->first();
                $column->name = $name;
                if($column->update()){
                    return redirect(url()->previous())->with('message', '栏目修改成功')->with('type','success')->withInput();
                }else{
                    return redirect(url()->previous())->with('message', '栏目修改失败')->with('type','danger')->withInput();
                }
            }
        }
    }
    public function publisher(){
        $column = Column::All();
        return view('admin_sys_article_publish')->with('column',$column);
    }
    public function articleAdd(Request $request){
        if ($request->isMethod('POST')) {
            $title= $request['title'];
            $article = Article::where('title',$title)->first();
            if($article){
                return redirect(url()->previous())->with('message', '文章标题已经存在，无法继续添加')->with('type','danger')->withInput();
            }else{
                $article = new Article();
                $article->title = $title;
                $article->source = $request['source'];
                $article->publisher = $request['publisher'];
                $article->body = $request['body'];
                $article->cid = $request['cid'];
                $article->hot = rand(5000, 10000);
                $article -> created_time = date('Y-m-d H:i:s',time());
                if($article->save()){
                    return redirect(url()->previous())->with('message', '文章添加成功')->with('type','success')->withInput();
                }else{
                    return redirect(url()->previous())->with('message', '文章添加失败')->with('type','danger')->withInput();
                }
            }
        }
    }
    public function test(){
        $qrcode = new \QRcode();//声明qrcode类

        $url='https://www.baidu.com/';//要转成二维码的url地址

        $errorLevel = "L";//容错率

        $size = "4";//生成图片大小

        $png = $qrcode->png($url, false, $errorLevel, $size);

    }
}
