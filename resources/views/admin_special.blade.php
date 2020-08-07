@extends('admin_sys_header')

@section('content')
    <div class="site-content">


        <div class="box box-block bg-white">
            <div class="form-group" style="height: auto; overflow: hidden;">
                <a href="{{url('admin/sys/special/add')}}" ><button type="button" class="  btn btn-primary w-min-sm m-b-1 waves-effect waves-light" style="float: right;display:inline-block" >添加产品</button></a>
            </div>
            <table class="table table-striped table-bordered dataTable" id="tab" >
                <thead>
                <tr>
                    <th>产品ID</th>
                    <th>产品名称</th>
                    <th>功耗</th>
                    <th>算力</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}&nbsp;<span class="tag tag-success top">{{$v->Attr->name}}</span>&nbsp;<span class="tag tag-info top">{{$v->ProductModel->name}}</span></td>
                        <td>{{$v->power}}</td>
                        <td>{{$v->computerPower}}</td>

                        <td><a href="jacascript::void(0)" ><button type="button" class="btn btn-purple w-min-xs  waves-effect waves-light yulan"  data-toggle="modal" data-target="#yulan" data-action="{{$v->id}}" >预览</button></a>
                            <a href="jacascript::void(0)" ><button type="button" class="btn btn-info w-min-xs  waves-effect waves-light bianji"  data-toggle="modal" data-target="#bianji" data-action="{{$v->id}}" >编辑</button></a>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
        $('#tab').DataTable( {
            dom: 'Bfrtip',
            iDisplayLength: 15,
            bStateSave:false,
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5'

            ]
        } );
    </script>


    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="yulan" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">

                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >产品名称：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control" type="text" name="name"  value="" id="ajaxName" readonly>
                        </div>
                    </div>
                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >产品时限：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control" type="text" name="name"  value="" id="ajaxAttr" readonly>
                        </div>
                    </div>
                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >产品模式：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control" type="text" name="name"  value="" id="ajaxModel" readonly>
                        </div>
                    </div>
                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >功耗：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control" type="text" name="name"  value="" id="ajaxPower" readonly>
                        </div>
                    </div>
                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >算力：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control" type="text" name="name"  value="" id="computerPower" readonly>
                        </div>
                    </div>

                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >缩略图：</label>
                        <div  style="float:left; width: 250px;">
                            <img src ="" style= 'width: 200px;' class="ajax_src" />
                        </div>
                    </div>


                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >库存：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control" type="text" name="name"  value="" id="stock" readonly>
                        </div>
                    </div>

                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >价格：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control price" type="text" name="price"  value="" readonly >
                        </div>
                    </div>

                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >特点：</label>
                        <div  style="float:left; width: 150px;">
                            <input class="form-control tagOne" type="text" name="tagOne"  value="" readonly >
                        </div>
                        <div  style="float:left; width: 150px;">
                            <input class="form-control tagTwo" type="text" name="tagTwo"  value=""  readonly>
                        </div>
                    </div>

                    <div class="form-group h-a" style="text-align: center;height: 600px;" >
                        <div class="col-md-3" style="text-align: right">
                            <label for="order" class=" col-form-label " >产品详情：</label>
                        </div>
                        <div class="col-md-6">
                            <div   class="form-group info" style="height: 600px;" >

                                <textarea id='summernote' class="info"></textarea>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="bianji" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/product/Up')}}">
                        {{ csrf_field() }}
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >产品名称：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control ajaxName" type="text" name="name"  value=""  >
                                <input class="form-control ajaxID" type="hidden" name="id"  value=""  >
                            </div>
                        </div>
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >产品时限：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control ajaxAttr" type="text" name="attr"  value=""  readonly>
                            </div>
                        </div>
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >产品模式：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control ajaxModel" type="text" name="model"  value=""  readonly>

                            </div>
                        </div>
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >功耗：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control ajaxPower" type="text" name="power"  value=""  >
                            </div>
                        </div>
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >算力：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control computerPower" type="text" name="computerPower"  value=""  >
                            </div>
                        </div>

                        {{--                    <div class="form-group h-a" style="text-align: center">--}}
                        {{--                        <label for="name" class=" col-form-label label200" >缩略图：</label>--}}
                        {{--                        <div  style="float:left; width: 250px;">--}}
                        {{--                            <img src ="" style= 'width: 200px;' class="ajax_src" />--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}


                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >库存：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control stock" type="text" name="stock"  value=""  >
                            </div>
                        </div>

                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >价格：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control price" type="text" name="price"  value=""  >
                            </div>
                        </div>

                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >特点：</label>
                            <div  style="float:left; width: 150px;">
                                <input class="form-control tagOne" type="text" name="tagOne"  value=""  >
                            </div>
                            <div  style="float:left; width: 150px;">
                                <input class="form-control tagTwo" type="text" name="tagTwo"  value=""  >
                            </div>
                        </div>

                        <div class="form-group h-a" style="text-align: center;height: 600px;" >
                            <label for="name" class=" col-form-label label200" >产品详情：</label>
                            <div  style="float:left; width: 450px;">
                                <div   class="form-group info" style="height: 600px;" >
                                    <textarea  class="info summernote" name="info"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </form>
                </div>

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
    <script>
        //会为符合条件的现有标签和未来标签都绑定事件（将未来标签写道on方法里）

        $(function () {
            $("body").delegate('.table-striped tr', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {
                    $.post("{{ url('/admin/sys/product/edit') }}/"+ $('.table-striped tr').eq($(this).index()+1).find('.yulan').data('action'),
                        {'_token': '{{ csrf_token() }}'}, function(data) {
                            $('#ajaxName').val(data['name']);
                            $('.ajaxID').val(data['id']);
                            $('#ajaxAttr').val(data['attr']);
                            $('#ajaxModel').val(data['model']);
                            $('#ajaxPower').val(data['power']);
                            $('#computerPower').val(data['computerPower']);
                            $('#stock').val(data['stock']);
                            $('.price').val(data['price']);
                            $('.tagOne').val(data['tagOne']);
                            $('.tagTwo').val(data['tagTwo']);
                            $('.ajax_src').attr('src',data['src']);
                            $('#summernote').summernote('code',data['info']);

                        });
                });
        })

    </script>
    <script>
        //会为符合条件的现有标签和未来标签都绑定事件（将未来标签写道on方法里）

        $(function () {
            $("body").delegate('.table-striped tr', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {
                    $.post("{{ url('/admin/sys/product/edit') }}/"+ $('.table-striped tr').eq($(this).index()+1).find('.bianji').data('action'),
                        {'_token': '{{ csrf_token() }}'}, function(data) {
                            $('.ajaxName').val(data['name']);
                            $('.ajaxAttr').val(data['attr']);
                            $('.ajaxModel').val(data['model']);
                            $('.ajaxPower').val(data['power']);
                            $('.computerPower').val(data['computerPower']);
                            $('.stock').val(data['stock']);
                            $('.price').val(data['price']);
                            $('.tagOne').val(data['tagOne']);
                            $('.tagTwo').val(data['tagTwo']);
                            $('.summernote').summernote('code',data['info']);

                        });
                });
        })

    </script>
@stop
