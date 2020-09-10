<?php

namespace App\Http\Controllers;

use App\Admin\Article;
use App\Admin\Attr;
use App\Admin\Cloud;
use App\Admin\Column;
use App\Admin\Order;
use App\Admin\Product;
use App\Admin\ProductModel;
use App\Admin\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Storage;


class ProductController extends CommomController
{
    //
    public function attr(){
        $attr = Attr::All();
        $productModel = ProductModel::All();
        $cloud = Cloud::All();
        return view('admin_product_attr')->with('attr',$attr)->with('productModel',$productModel)->with('cloud',$cloud);
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
    public function cloudAdd(Request $request){
        if ($request->isMethod('POST')) {
            $name = $request['name'];
            $cloud = Cloud::where('name',$name)->first();
            if($cloud){
                return redirect(url()->previous())->with('message', '属性已经存在，无法继续添加')->with('type','danger')->withInput();
            }else{
                $cloud = new Cloud();
                $cloud->name = $name;

                if($cloud->save()){
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
    public function cloudUp(Request $request){
        if ($request->isMethod('POST')) {
            $name = $request['name'];
            $could = Cloud::where('name',$name)->first();
            if($could){
                return redirect(url()->previous())->with('message', '属性已经存在，无法修改')->with('type','danger')->withInput();
            }else{
                $could = Cloud::where('id',$request['id'])->first();
                $could->name = $name;
                if($could->update()){
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
    public function cloudEdit($id){
        if($id){
            $cloud = Cloud::where('id',$id)->first();
            return  $cloud;
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
        $data = Product::with('Attr','ProductModel')->where('model','1')->get();
        return view('admin_product')->with('attr',$attr)->with('productModel',$productModel)->with('data',$data);
    }
    public function crowd(){
        $attr = Attr::All();
        $productModel = ProductModel::All();
        $data = Product::with('Attr','ProductModel')->where('model','2')->get();
        return view('admin_crowd')->with('attr',$attr)->with('productModel',$productModel)->with('data',$data);
    }
    public function cloudPower(){
        $attr = Attr::All();
        $productModel = ProductModel::All();
        $cloud= Cloud::All();
        $data = Product::with('Cloud','ProductModel')->where('model','3')->get();

        return view('admin_cloudPower')->with('attr',$attr)->with('productModel',$productModel)->with('data',$data)->with('cloud',$cloud);
    }
    public function depository(){
        $attr = Attr::All();
        $productModel = ProductModel::All();
        $cloud= Cloud::All();
        $data = Product::with('Cloud','ProductModel')->where('model','4')->get();

        return view('admin_depository')->with('attr',$attr)->with('productModel',$productModel)->with('data',$data)->with('cloud',$cloud);
    }
    public function xinren(){
        $attr = Attr::All();
        $productModel = ProductModel::All();
        $cloud= Cloud::All();
        $data = Product::with('Cloud','ProductModel')->where('model','5')->get();

        return view('admin_xinren')->with('attr',$attr)->with('productModel',$productModel)->with('data',$data)->with('cloud',$cloud);
    }
    public function special(){
        $attr = Attr::All();
        $productModel = ProductModel::All();
        $cloud= Cloud::All();
        $data = Product::with('Cloud','ProductModel')->where('model','6')->get();

        return view('admin_special')->with('attr',$attr)->with('productModel',$productModel)->with('data',$data)->with('cloud',$cloud);
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
            $product->price = $request['price'];
            $product->tagOne = $request['tagOne'];
            $product->tagTwo = $request['tagTwo'];

            $product->pic = $pic_path;
            $product->info = $request['info'];
            if($product->save()){
                return redirect(url()->previous())->with('message', '产品名称添加成功')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '产品名称添加失败')->with('type','danger')->withInput();
            }
        }else{
            $attr = Attr::All();
            $productModel = ProductModel::where('id',1)->first();
            return view('admin_product_add')->with('attr',$attr)->with('productModel',$productModel);
        }

    }
    public function crowdAdd(Request $request){
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
            $product->price = $request['price'];
            $product->tagOne = $request['tagOne'];
            $product->tagTwo = $request['tagTwo'];

            $product->pic = $pic_path;
            $product->info = $request['info'];
            if($product->save()){
                return redirect(url()->previous())->with('message', '产品名称添加成功')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '产品名称添加失败')->with('type','danger')->withInput();
            }
        }else{
            $attr = Attr::All();
            $productModel = ProductModel::where('id',2)->first();
            return view('admin_crowd_add')->with('attr',$attr)->with('productModel',$productModel);
        }

    }
    public function cloudPowerAdd(Request $request){
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
            $product->cloud = $request['cloud'];
            $product->model = $request['model'];
            $product->power = $request['power'];
            $product->computerPower = $request['computerPower'];
            $product->stock = $request['stock'];
            $product->price = $request['price'];
            $product->tagOne = $request['tagOne'];
            $product->tagTwo = $request['tagTwo'];

            $product->pic = $pic_path;
            $product->info = $request['info'];
            if($product->save()){
                return redirect(url()->previous())->with('message', '产品添加成功')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '产品添加失败')->with('type','danger')->withInput();
            }
        }else{
            $attr = Attr::All();
            $productModel = ProductModel::where('id',3)->first();

            return view('admin_cloudPower_add')->with('attr',$attr)->with('productModel',$productModel)->with('cloud',Cloud::All());
        }
    }
    public function depositoryAdd(Request $request){
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
            $product->price = $request['price'];
            $product->tagOne = $request['tagOne'];
            $product->tagTwo = $request['tagTwo'];

            $product->pic = $pic_path;
            $product->info = $request['info'];
            if($product->save()){
                return redirect(url()->previous())->with('message', '产品添加成功')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '产品添加失败')->with('type','danger')->withInput();
            }
        }else{
            $attr = Attr::All();
            $productModel = ProductModel::where('id',4)->first();
            return view('admin_depository_add')->with('attr',$attr)->with('productModel',$productModel);
        }
    }
    public function xinrenAdd(Request $request){
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
            $product->price = $request['price'];
            $product->tagOne = $request['tagOne'];
            $product->tagTwo = $request['tagTwo'];

            $product->pic = $pic_path;
            $product->info = $request['info'];
            if($product->save()){
                return redirect(url()->previous())->with('message', '产品添加成功')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '产品添加失败')->with('type','danger')->withInput();
            }
        }else{
            $attr = Attr::All();
            $productModel = ProductModel::where('id',5)->first();
            return view('admin_xinren_add')->with('attr',$attr)->with('productModel',$productModel);
        }
    }
    public function specialAdd(Request $request){
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
            $product->price = $request['price'];
            $product->tagOne = $request['tagOne'];
            $product->tagTwo = $request['tagTwo'];

            $product->pic = $pic_path;
            $product->info = $request['info'];
            if($product->save()){
                return redirect(url()->previous())->with('message', '产品添加成功')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '产品添加失败')->with('type','danger')->withInput();
            }
        }else{
            $attr = Attr::All();
            $productModel = ProductModel::where('id',6)->first();
            return view('admin_special_add')->with('attr',$attr)->with('productModel',$productModel);
        }
    }
    public function productEdit($id){
        if($id){
            $product = Product::with('Attr','ProductModel','Cloud')->where('id',$id)->first();
            $data = array();
            $data['name'] = $product->name;
            $data['attr'] = isset($product->Attr->name)?$product->Attr->name:'';
            $data['model'] = isset($product->ProductModel->name)?$product->ProductModel->name:'';
            $data['cloud'] = isset($product->Cloud->name)?$product->Cloud->name:'';
            $data['modelId'] = $product->ProductModel->id;
            $data['power'] = $product->power;
            $data['computerPower'] = $product->computerPower;
            $data['stock'] = $product->stock;
            $data['src'] = '/storage/app/public/pic/'.$product->pic;
            $data['info'] = $product->info;
            $data['price'] = $product->price;
            $data['tagOne'] = $product->tagOne;
            $data['tagTwo'] = $product->tagTwo;
            $data['id'] = $product->id;


            return  $data;
        }
    }
    public function productUp(Request $request){
        if ($request->isMethod('POST')) {
            $product = Product::where('id',$request['id'])->first();

            if($product->name != $request['name']){
                $pro = Product::where('name',$request['name'])->first();
                if($pro){
                    return redirect(url()->previous())->with('message', '产品名称已经存在')->with('type','danger')->withInput();
                }
                $product->name = $request['name'];
            }
            $product->power = $request['power'];
            $product->computerPower = $request['computerPower'];
            $product->stock = $request['stock'];
            $product->price = $request['price'];
            $product->tagOne = $request['tagOne'];
            $product->tagTwo = $request['tagTwo'];
            $product->info = $request['info'];
            if($product->update()){
                return redirect(url()->previous())->with('message', '产品编辑成功')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '产品编辑失败')->with('type','danger')->withInput();
            }

        }
    }
    public function order($id){
        $product = Product::where('id',$id)->first();
        return view('order')->with('data',$product);
    }
    public function item(Request $request){
        if ($request->isMethod('POST')) {
            $car = $request['car'];
            session(['car' => $car]);
            return '';
        }
    }
    public function orderUP(Request $request){
        if ($request->isMethod('POST')) {
            $name = $request['name'];
            $order = new Order();
            $order->name = $name;
            $order->code = $request['code'];
            $pid = Product::where('id',$request['id'])->first();
            $order->pid = $pid->id;
            $order->uid = session('indexlogin')->id;
            $order->created_time = date('Y-m-d H:i:s',time());
            $order->num = $request['num'];
            $order->UnitPrice = $request['UnitPrice'];
            $order->TotalPrice = $request['TotalPrice'];
            if($order->save()){
                return redirect('pay')->with('message', '创建订单成功')->with('type','success')->withInput();
            }else{
                return redirect(url()->previous())->with('message', '创建订单失败')->with('type','danger')->withInput();
            }
        }
    }
    public function pay(){
        return view('payNow');
    }
    public function sysOrder(){
        $order = Order::All();
        return view('admin_order')->with('data',$order);
    }
    public function complete($id){
        $order = Order::where('id',$id)->first();
        if ($order){
            $order->status = 2;
            $order->force_time = date('Y-m-d h:i:s');
            if($order->update()){
                $product = Product::where('id',$order->pid)->first();
                if($product->stock - $order->num >= 0){
                    $product->stock = $product->stock - $order->num;
                    if($product->update()){
                        return redirect(url()->previous())->with('message', '操作成功')->with('type','success')->withInput();
                    }
                }else{
                    return redirect(url()->previous())->with('message', '库存不足')->with('type','danger')->withInput();
                }

            }else{
                return redirect(url()->previous())->with('message', '操作失败')->with('type','danger')->withInput();
            }
        }
    }
    public function userOrder(){
        $user = session('indexlogin');
        $order = Order::where('uid',$user->id)->orderby('id','DESC')->get();

        return view('orderList')->with('data',$order);
    }
    public function userPower(){
        $user = session('indexlogin');
        $order = Order::with('Product')->where('uid',$user->id)->orderby('id','DESC')->where('status',2)->get();
        $suan = 0;
        foreach ($order as $v){
            //$suan+=$v
            if($v->Product->model == 1 || $v->Product->model == 2){
                $suan += strstr($v->Product->computerPower,'TH/s',true) * $v->num;
            }

        }
        return view('power')->with('data',$order)->with('suan',$suan);
    }
    public function userIncome(){
        $user = session('indexlogin');
        $order = Order::with('Product')->where('uid',$user->id)->orderby('id','DESC')->where('status',2)->get();

        return view('income')->with('data',$order);
    }
    public function voucher(){
        $data = Upload::with('User','Realname')->where('uid','!=',1)->get();
        return view('admin_voucher')->with('data',$data);
    }
}
