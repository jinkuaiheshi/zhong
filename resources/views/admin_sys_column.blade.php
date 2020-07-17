@extends('admin_sys_header')

@section('content')
    <div class="site-content">


        <div class="box box-block bg-white">
            <div class="form-group" style="height: auto; overflow: hidden;">
                <a href="jacascript::void(0)" ><button type="button" class="  btn btn-primary w-min-sm m-b-1 waves-effect waves-light" style="float: right;display:inline-block" data-toggle="modal" data-target="#column" data-action="column">添加栏目</button></a>
            </div>
            <table class="table table-striped table-bordered dataTable" id="tab" >
                <thead>
                <tr>
                    <th>栏目ID</th>
                    <th>栏目名称</th>

                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>
                      
                        <td><a href="{{url('admin/sys/column/'.$v->id)}}" ><button type="button" class="btn btn-purple w-min-xs  waves-effect waves-light"   >文章管理</button></a>
                            <a href="jacascript::void(0)" ><button type="button" class="btn btn-success w-min-xs  waves-effect waves-light columnEdit"   data-action="{{$v->id}}">栏目名称修改</button>
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
    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="column" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/column/add')}}">
                        {{ csrf_field() }}
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >栏目名称：</label>
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

    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="columnEdit" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/column/up')}}/"  >
                        {{ csrf_field() }}
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >栏目名称：</label>
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
            $("body").delegate('.table-striped tr', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {
                    $.post("{{ url('/admin/sys/column/edit') }}/"+ $('.table-striped tr').eq($(this).index()+1).find('.columnEdit').data('action'),
                        {'_token': '{{ csrf_token() }}'}, function(data) {

                            $('#columnEdit').modal();
                            $('#ajaxtitle').val(data.name);
                            $('#ajaxID').val(data.id);
                        });
                });
        })

    </script>
@stop