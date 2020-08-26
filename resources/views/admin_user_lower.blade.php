@extends('admin_sys_header')

@section('content')
    <div class="site-content">


        <div class="box box-block bg-white">
            <div class="form-group" style="height: auto; overflow: hidden;">

            </div>
            <table class="table table-striped table-bordered dataTable" id="tab" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>创建时间</th>
                    <th>最后登录时间</th>
                    <th>权限</th>
                    <th>绑定手机</th>
                    <th>等级</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v['id']}}</td>
                        <td>{{$v['username']}}</td>
                        <td>{{$v['create_time']}}</td>
                        <td>{{$v['last_login_time']}}</td>
                        <td>@if($v['auth']==3)<span class="btn btn-outline-primary w-min-sm m-b-0-25 waves-effect waves-light">个人代理</span>@elseif($v['auth']==7)<span class="btn btn-outline-success w-min-sm m-b-0-25 waves-effect waves-light">省代理</span>@elseif($v['auth']==8)<span class="btn btn-outline-info  w-min-sm m-b-0-25 waves-effect waves-light">市代理</span>@elseif($v['auth']==9)<span class="btn btn-outline-black  w-min-sm m-b-0-25 waves-effect waves-light">县代理</span>@endif</td>
                        <td>{{$v['tel']}}</td>
                        <td>@if($v['level']==1)<span class="btn btn-outline-primary w-min-sm m-b-0-25 waves-effect waves-light">英勇黄铜</span>@elseif($v['level']==2)<span class="btn btn-outline-success w-min-sm m-b-0-25 waves-effect waves-light">华贵铂金</span>@elseif($v['level']==3)<span class="btn btn-outline-info  w-min-sm m-b-0-25 waves-effect waves-light">璀璨钻石</span>@elseif($v['level']==4)<span class="btn btn-outline-black  w-min-sm m-b-0-25 waves-effect waves-light">最强王者</span>@endif</td>
                        <td><a href="jacascript::void(0)" ><button type="button" class="btn btn-warning w-min-xs  waves-effect waves-light quanxian"  data-toggle="modal" data-target="#quanxian" data-action="{{$v['id']}}" >权限设置</button></a>

                            <a href="jacascript::void(0)" ><button type="button" class="btn btn-danger w-min-xs  waves-effect waves-light ziliao"  data-toggle="modal" data-target="#ziliao" data-action="{{$v['id']}}" >账户信息</button></a>
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
    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="quanxian" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/user')}}">
                        {{ csrf_field() }}
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >权限类型：</label>
                            <div  style="float:left; width: 250px;">
                                <select class="form-control " name = 'auto' required id="auto" readonly>


                                    <option value="7" style="text-align: center;"
                                    >省级代理</option>
                                    <option value="8" style="text-align: center;"
                                    >市级代理</option>
                                    <option value="9" style="text-align: center;"
                                    >县级代理</option>

                                </select>
                            </div>
                        </div>
                        <input type="hidden" value="" id="uid" name="id">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(function(){

            /* =================================================================
                Select2
            ================================================================= */

            var selectorx = $('#select2').select2();



        });
    </script>

    <script>
        //会为符合条件的现有标签和未来标签都绑定事件（将未来标签写道on方法里）

        $(function () {
            $("body").delegate('.table-striped tr', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {

                    $.post("{{ url('/admin/sys/user/info') }}/"+ $('.table-striped tr').eq($(this).index()+1).find('.quanxian').data('action'),
                        {'_token': '{{ csrf_token() }}'}, function(data) {
                            $('#uid').val(data.id);
                        });
                });
        })

    </script>
    <script>
        //会为符合条件的现有标签和未来标签都绑定事件（将未来标签写道on方法里）

        $(function () {
            $("body").delegate('.table-striped tr', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {

                    $.post("{{ url('/admin/sys/user/info') }}/"+ $('.table-striped tr').eq($(this).index()+1).find('.shangji').data('action'),
                        {'_token': '{{ csrf_token() }}'}, function(data) {
                            $('#shangjiID').val(data.id);
                        });
                });
        })

    </script>
    <script>
        $('#select2').change(function () {

            $('#select').val($('#select2').val());
            $('#sub').show();
        })
    </script>


@stop