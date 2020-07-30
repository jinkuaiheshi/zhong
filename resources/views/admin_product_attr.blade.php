@extends('admin_sys_header')

@section('content')
    <div class="site-content" style="height: 100%; overflow: hidden">
        <div class="box box-block bg-white">
            <div style="width: 100%; text-align: center; font-size: 20px;">产品年限属性</div>
            <div class="form-group" style="height: auto; overflow: hidden;">
                <a href="jacascript::void(0)" ><button type="button" class="  btn btn-primary w-min-sm m-b-1 waves-effect waves-light" style="float: right;display:inline-block" data-toggle="modal" data-target="#attr" data-action="attr">添加属性</button></a>
            </div>
            <table class="table table-striped table-bordered dataTable table-attr" id="tab" >
                <thead>
                <tr>
                    <th>属性ID</th>
                    <th>产品年限</th>

                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($attr as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>

                        <td>
                            <a href="jacascript::void(0)" ><button type="button" class="btn btn-success w-min-xs  waves-effect waves-light attrEdit" data-toggle="modal" data-target="#attrEdit" data-action="{{$v->id}}">产品时限修改</button>
                            </a>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="site-content" style="height: 100%; overflow: hidden">
        <div class="box box-block bg-white">
            <div style="width: 100%; text-align: center; font-size: 20px;">产品模式属性</div>
            <div class="form-group" style="height: auto; overflow: hidden;">
                <a href="jacascript::void(0)" ><button type="button" class="  btn btn-primary w-min-sm m-b-1 waves-effect waves-light" style="float: right;display:inline-block" data-toggle="modal" data-target="#model" data-action="attr">添加属性</button></a>
            </div>
            <table class="table table-striped table-bordered dataTable table-model" id="tab2" >
                <thead>
                <tr>
                    <th>属性ID</th>
                    <th>产品模式</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productModel as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>

                        <td>
                            <a href="jacascript::void(0)" ><button type="button" class="btn btn-success w-min-xs  waves-effect waves-light attrModel" data-toggle="modal" data-target="#modelEdit" data-action="{{$v->id}}">产品模式属性修改</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="site-content" style="height: 100%; overflow: hidden">
        <div class="box box-block bg-white">
            <div style="width: 100%; text-align: center; font-size: 20px;">云算力产品</div>
            <div class="form-group" style="height: auto; overflow: hidden;">
                <a href="jacascript::void(0)" ><button type="button" class="  btn btn-primary w-min-sm m-b-1 waves-effect waves-light" style="float: right;display:inline-block" data-toggle="modal" data-target="#cloud" data-action="cloud">添加属性</button></a>
            </div>
            <table class="table table-striped table-bordered dataTable table-cloud" id="tab3" >
                <thead>
                <tr>
                    <th>属性ID</th>
                    <th>产品模式</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cloud as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>

                        <td>
                            <a href="jacascript::void(0)" ><button type="button" class="btn btn-success w-min-xs  waves-effect waves-light attrModel" data-toggle="modal" data-target="#cloudEdit" data-action="{{$v->id}}">云算力产品修改</button>
                            </a>
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
        $('#tab2').DataTable( {
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
    <script>
        $('#tab3').DataTable( {
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
    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="attr" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/product/attr/add')}}">
                        {{ csrf_field() }}
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >产品时限：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control" type="text" name="name"  value="" >

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

    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="attrEdit" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/product/attr/up')}}/"  >
                        {{ csrf_field() }}
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >产品时限：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control" type="text" name="name"  value="" id="ajaxtitle" >
                                <input class="form-control" type="hidden" name="id" value="" id="ajaxID">
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
        //会为符合条件的现有标签和未来标签都绑定事件（将未来标签写道on方法里）

        $(function () {
            $("body").delegate('.table-attr tr', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {
                    $.post("{{ url('/admin/sys/product/attr/edit') }}/"+ $('.table-striped tr').eq($(this).index()+1).find('.attrEdit').data('action'),
                        {'_token': '{{ csrf_token() }}'}, function(data) {

                            $('#attrEdit').modal();
                            $('#ajaxtitle').val(data.name);
                            $('#ajaxID').val(data.id);
                        });

                });
        })

    </script>

    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="model" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/product/model/add')}}">
                        {{ csrf_field() }}
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >产品模式：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control" type="text" name="name"  value="" >

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
    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="modelEdit" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/product/model/up')}}/"  >
                        {{ csrf_field() }}
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >产品模式：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control" type="text" name="name"  value="" id="ajaxtitletitle" >
                                <input class="form-control" type="hidden" name="id" value="" id="ajaxIDID">
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
        //会为符合条件的现有标签和未来标签都绑定事件（将未来标签写道on方法里）

        $(function () {
            $("body").delegate('.table-model tr', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {
                    $.post("{{ url('/admin/sys/product/model/edit') }}/"+ $('.table-model tr').eq($(this).index()+1).find('.attrModel').data('action'),
                        {'_token': '{{ csrf_token() }}'}, function(data) {


                            $('#ajaxtitletitle').val(data.name);
                            $('#ajaxIDID').val(data.id);
                        });

                });
        })

    </script>

    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="cloud" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/product/cloud/add')}}">
                        {{ csrf_field() }}
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >云算力产品：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control" type="text" name="name"  value="" >

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
    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="cloudEdit" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/product/cloud/up')}}/"  >
                        {{ csrf_field() }}
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >产品模式：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control" type="text" name="name"  value="" id="Atitle" >
                                <input class="form-control" type="hidden" name="id" value="" id="AID">
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
        //会为符合条件的现有标签和未来标签都绑定事件（将未来标签写道on方法里）

        $(function () {
            $("body").delegate('.table-cloud tr', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {
                    $.post("{{ url('/admin/sys/product/cloud/edit') }}/"+ $('.table-model tr').eq($(this).index()+1).find('.attrModel').data('action'),
                        {'_token': '{{ csrf_token() }}'}, function(data) {
                            $('#Atitle').val(data.name);
                            $('#AID').val(data.id);
                        });

                });
        })

    </script>
@stop
