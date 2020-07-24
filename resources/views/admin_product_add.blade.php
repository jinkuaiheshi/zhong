@extends('admin_sys_header')

@section('content')


    <div class="site-content">


        <div class="box box-block bg-white">

            <p class="font-90 text-muted m-b-3"></p>

            <div class="row">
                <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/product/add')}}">
                    {{ csrf_field() }}




                        <div class="form-group h-a" style="text-align: center">
                            <div class="col-md-3" style="text-align: right">
                                <label for="order" class=" col-form-label " >产品名称：</label>
                            </div>
                            <div class="col-md-6">
                                <div   class="form-group">
                                    <input type="text" placeholder="" class="form-control" name="name" required >
                                </div>
                            </div>
                        </div>


                        <div class="form-group h-a" style="text-align: center">
                            <div class="col-md-3" style="text-align: right">
                                <label for="order" class=" col-form-label " >产品时限：</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control " name = 'attr' required id="attr" >

                                    @foreach ($attr as $v)
                                        <option value="{{$v->id}}" style="text-align: center;"
                                        >{{$v->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    <div class="form-group h-a" style="text-align: center">
                        <div class="col-md-3" style="text-align: right">
                            <label for="order" class=" col-form-label " >产品模式：</label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control " name = 'model' required id="model" readonly>


                                    <option value="{{$productModel->id}}" style="text-align: center;"
                                    >{{$productModel->name}}</option>


                            </select>
                        </div>
                    </div>



                    <div class="form-group h-a" style="text-align: center">
                        <div class="col-md-3" style="text-align: right">
                            <label for="order" class=" col-form-label " >功耗：</label>
                        </div>
                        <div class="col-md-3">
                            <div   class="form-group">
                                <input type="text" placeholder="" class="form-control" name="power" required >
                            </div>
                        </div>
                    </div>

                    <div class="form-group h-a" style="text-align: center">
                        <div class="col-md-3" style="text-align: right">
                            <label for="order" class=" col-form-label " >算力：</label>
                        </div>
                        <div class="col-md-3">
                            <div   class="form-group">
                                <input type="text" placeholder="" class="form-control" name="computerPower" required >
                            </div>
                        </div>
                    </div>

                    <div class="form-group h-a" style="text-align: center">
                        <div class="col-md-3" style="text-align: right">
                            <label for="order" class=" col-form-label " >库存：</label>
                        </div>
                        <div class="col-md-1">
                            <div   class="form-group">
                                <input type="number" placeholder="" class="form-control" name="stock" required >
                            </div>
                        </div>
                        <div class="col-md-1" style="text-align: right">
                            <label for="order" class=" col-form-label " >价格：</label>
                        </div>
                        <div class="col-md-1">
                            <div   class="form-group">
                                <input type="number" placeholder="" class="form-control" name="price" readonly value="21000" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group h-a" style="text-align: center">
                        <div class="col-md-3" style="text-align: right">
                            <label for="order" class=" col-form-label " >特点：</label>
                        </div>
                        <div class="col-md-1">
                            <div   class="form-group">
                                <input type="text" placeholder="" class="form-control" name="tagOne" required >
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div   class="form-group">
                                <input type="text" placeholder="" class="form-control" name="tagTwo" required >
                            </div>
                        </div>
                    </div>

                    <div class="form-group h-a" style="text-align: center">
                        <div class="col-md-3" style="text-align: right">
                            <label for="order" class=" col-form-label " >产品图片</label>
                        </div>
                        <div class="col-md-3">
                            <div class="dropify-message">
                                <span class="file-icon"></span>
                            </div>
                            <div class="dropify-loader"></div>
                            <div class="dropify-errors-container"><ul></ul></div>
                            <input type="file" id="input-file-now" class="dropify" name="pic">
                        </div>
                    </div>


                    <div class="form-group h-a" style="text-align: center;height: 600px;" >
                        <div class="col-md-3" style="text-align: right">
                            <label for="order" class=" col-form-label " >产品详情：</label>
                        </div>
                        <div class="col-md-6">
                            <div   class="form-group" style="height: 600px;">


                                <textarea id="summernote" style="height: 600px;" name="info"></textarea>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(function () {
                            $('#summernote').summernote({
                                height: 450,
                                tabsize: 2,
                                lang: 'zh-CN'
                            });
                            $('#summernote').summernote('justifyLeft');
                        })
                    </script>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="javascript:history.back(-1);">取消</button>
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>


                </form>
            </div>
        </div>



    </div>
    @if(Session::has('message'))
        <div id="toast-container" class="toast-top-right" aria-live="polite" role="alert"><div class="toast
@if(Session::get('type')=='danger')
                    toast-error
@elseif(Session::get('type')=='success')
                    toast-success
@endif " style="display: block;"><div class="toast-message">{{Session::get('message')}}</div></div></div>
    @endif



    <script>
        $(function () {
            var toast = $('#toast-container');
            setTimeout(function () {
                toast.fadeOut(1000);
            },3000);
        })
    </script>

    <script>
        $(document).ready(function() {

            $('.dropify').dropify();

        });
    </script>


@stop