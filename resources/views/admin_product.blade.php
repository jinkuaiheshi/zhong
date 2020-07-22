@extends('admin_sys_header')

@section('content')
    <div class="site-content">


        <div class="box box-block bg-white">
            <div class="form-group" style="height: auto; overflow: hidden;">
                <a href="{{url('admin/sys/product/add')}}" ><button type="button" class="  btn btn-primary w-min-sm m-b-1 waves-effect waves-light" style="float: right;display:inline-block" >添加产品</button></a>
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
                                <input class="form-control" type="text" name="name"  value="" id="ajaxName" disabled>
                            </div>
                        </div>
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >产品时限：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control" type="text" name="name"  value="" id="ajaxAttr" disabled>
                            </div>
                        </div>
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >产品模式：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control" type="text" name="name"  value="" id="ajaxModel" disabled>
                            </div>
                        </div>
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >功耗：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control" type="text" name="name"  value="" id="ajaxPower" disabled>
                            </div>
                        </div>
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >算力：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control" type="text" name="name"  value="" id="computerPower" disabled>
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
                            <input class="form-control" type="text" name="name"  value="" id="stock" disabled>
                        </div>
                    </div>

                    <div class="form-group h-a" style="text-align: center;height: 600px;" >
                        <div class="col-md-3" style="text-align: right">
                            <label for="order" class=" col-form-label " >产品详情：</label>
                        </div>
                        <div class="col-md-6">
                            <div   class="form-group info" style="height: 600px;" >

                                <textarea id='summernote' class="info">1111111111111</textarea>

                            </div>
                        </div>
                    </div>


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

                            console.log(data);
                            $('#ajaxName').val(data['name']);
                            $('#ajaxAttr').val(data['attr']);
                            $('#ajaxModel').val(data['model']);
                             $('#ajaxPower').val(data['power']);
                             $('#computerPower').val(data['computerPower']);
                             $('#stock').val(data['stock']);
                             $('.ajax_src').attr('src',data['src']);
                            $('#summernote').summernote('code',data['info']);

                        });
                });
        })

    </script>
@stop