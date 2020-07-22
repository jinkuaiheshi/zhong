<?php

namespace App\Http\Controllers;

use App\Admin\Article;
use App\Admin\Attr;
use App\Admin\Column;
use App\Admin\Product;
use App\Admin\ProductModel;
use Illuminate\Http\Request;
use Storage;


class ProductController extends CommomController
{
    //
    public function attr(){
        $attr = Attr::All();
        $productModel = ProductModel::All();
        return view('admin_product_attr')->with('attr',$attr)->with('productModel',$productModel);
    }
    public function attrAdd(Request $request){
        if ($request->isMethod('POST')) {
            $name = $request['name'];
            $attr = Attr::where('name',$name)->first();
            if($attr){
                return redirect(url()->previous())->with('message', '属性已经存在，无法继续添加')->with('type','danger')->withInput();
            }else{
                $attr = new Attr();
                $attr->name = $name;
                $attr -> created_time = date('Y-m-d H:i:s',time());

                if($attr->save()){
                    return redirect(url()->previous())->with('message', '属性添加成功')->with('type','success')->withInput();
                }else{
                    return redirect(url()->previous())->with('message', '属性添加失败')->with('type','danger')->withInput();
                }
            }
        }else{
            return view('admin_product_attr');
        }
    }
    public function modelAdd(Request $request){
        if ($request->isMethod('POST')) {
            $name = $request['name'];
            $model = ProductModel::where('name',$name)->first();
            if($model){
                return redirect(url()->previous())->with('message', '属性已经存在，无法继续添加')->with('type','danger')->withInput();
            }else{
                $model = new ProductModel();
                $model->name = $name;
                $model -> created_time = date('Y-m-d H:i:s',time());

                if($model->save()){
                    return redirect(url()->previous())->with('message', '属性添加成功')->with('type','success')->withInput();
                }else{
                    return redirect(url()->previous())->with('message', '属性添加失败')->with('type','danger')->withInput();
                }
            }
        }else{
            return view('admin_product_attr');
        }
    }
    public function attrUp(Request $request){
        if ($request->isMethod('POST')) {
            $name = $request['name'];
            $attr = Attr::where('name',$name)->first();
            if($attr){
                return redirect(url()->previous())->with('message', '属性已经存在，无法修改')->with('type','danger')->withInput();
            }else{
                $attr = Attr::where('id',$request['id'])->first();
                $attr->name = $name;
                if($attr->update()){
                    return redirect(url()->previous())->with('message', '属性修改成功')->with('type','success')->withInput();
                }else{
                    return redirect(url()->previous())->with('message', '属性修改失败')->with('type','danger')->withInput();
                }
            }
        }
    }
    public function attrEdit($id){
        if($id){
            $attr = Attr::where('id',$id)->first();
            return  $attr;
        }
    }
    public function modelEdit($id){
        if($id){
            $model = ProductModel::where('id',$id)->first();
            return  $model;
        }
    }
    public function modelUp(Request $request){
        if ($request->isMethod('POST')) {
            $name = $request['name'];
            $model = ProductModel::where('name',$name)->first();
            if($model){
                return redirect(url()->previous())->with('message', '属性已经存在，无法修改')->with('type','danger')->withInput();
            }else{
                $model = ProductModel::where('id',$request['id'])->first();
                $model->name = $name;
                if($model->update()){
                    return redirect(url()->previous())->with('message', '属性修改成功')->with('type','success')->withInput();
                }else{
                    return redirect(url()->previous())->with('message', '属性修改失败')->with('type','danger')->withInput();
                }
            }
        }
    }
    public function product(){
        $attr = Attr::All();
        $productModel = ProductModel::All();
        $data = Product::with('Attr','ProductModel')->get();
        return view('admin_product')->with('attr',$attr)->with('productModel',$productModel)->with('data',$data);
    }
    public function productAdd(Request $request){
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
            }else{
                return redirect(url()->previous())->with('message', '上传文件失败或者已经损坏')->with('type','danger')->withInput();
            }
            $name = $request['name'];
            $product = Product::where('name',$name)->first();
            if($product){
                return redirect(url()->previous())->with('message', '产品名称已经存在')->with('type','danger')->withInput();
            }
            $product = new Product();
            $product->name = $name;
            $product->attr = $request['attr'];
            $product->model = $request['model'];
            $product->power = $request['power'];
            $product->computerPower = $request['computerPower'];
            $product->stock = $request['stock'];
            $product->pic = $pic_path;
            $product->info = $request['info'];
            if($product->save()){
                return redirect(url()->previous())->with('message', '产品名称添加成功')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '产品名称添加失败')->with('type','danger')->withInput();
            }
        }else{
            $attr = Attr::All();
            $productModel = ProductModel::All();
            return view('admin_product_add')->with('attr',$attr)->with('productModel',$productModel);
        }

    }
    public function productEdit($id){
        if($id){
            $product = Product::with('Attr','ProductModel')->where('id',$id)->first();
            $data = array();
            $data['name'] = $product->name;
            $data['attr'] = $product->Attr->name;
            $data['model'] = $product->ProductModel->name;
            $data['power'] = $product->power;
            $data['computerPower'] = $product->computerPower;
            $data['stock'] = $product->stock;
            $data['src'] = '/storage/app/public/pic/'.$product->pic;

            $data['info'] = $product->info;
            return  $data;
        }
    }
}
