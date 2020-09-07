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
                    <th>认证姓名</th>

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
                        <td>{{$v['Realname']}}</td>

                        <td>@if($v['auth']==3)<span class="btn btn-outline-primary w-min-sm m-b-0-25 waves-effect waves-light">个人代理</span>@elseif($v['auth']==7)<span class="btn btn-outline-success w-min-sm m-b-0-25 waves-effect waves-light">省代理</span>@elseif($v['auth']==8)<span class="btn btn-outline-info  w-min-sm m-b-0-25 waves-effect waves-light">市代理</span>@elseif($v['auth']==9)<span class="btn btn-outline-black  w-min-sm m-b-0-25 waves-effect waves-light">县代理</span>@endif</td>
                        <td>{{$v['tel']}}</td>
                        <td>@if($v['level']==1)<span class="btn btn-outline-primary w-min-sm m-b-0-25 waves-effect waves-light">青铜会员</span>@elseif($v['level']==2)<span class="btn btn-outline-success w-min-sm m-b-0-25 waves-effect waves-light">白银会员</span>@elseif($v['level']==3)<span class="btn btn-outline-info  w-min-sm m-b-0-25 waves-effect waves-light">黄金会员</span>@elseif($v['level']==4)<span class="btn btn-outline-warning  w-min-sm m-b-0-25 waves-effect waves-light">铂金会员</span>@elseif($v['level']==5)<span class="btn btn-outline-black  w-min-sm m-b-0-25 waves-effect waves-light">钻石会员</span>@endif</td>
                        <td><a href="jacascript::void(0)" ><button type="button" class="btn btn-warning w-min-xs  waves-effect waves-light quanxian"  data-toggle="modal" data-target="#quanxian" data-action="{{$v['id']}}" >权限设置</button></a>
                           @if($v['top'] == -1)<a href="jacascript::void(0)" ><button type="button" class="btn btn-primary w-min-xs  waves-effect waves-light shangji"  data-toggle="modal" data-target="#shangji" data-action="{{$v['id']}}" >上级设置</button></a>@else<a href="jacascript::void(0)" ><button type="button" class="btn btn-purple w-min-xs  waves-effect waves-light chakan"  data-toggle="modal" data-target="#chakan" data-action="{{$v['id']}}" >查看上级</button></a>@endif
                            <a href="jacascript::void(0)" ><button type="button" class="btn btn-danger w-min-xs  waves-effect waves-light bank"  data-toggle="modal" data-target="#bank" data-action="{{$v['id']}}" >账户信息</button></a>
                            <a href="{{url('admin/sys/user/lower').'/'.$v['id']}}" ><button type="button" class="btn btn-info w-min-xs  waves-effect waves-light "   >下级管理</button></a>
                            <a href="jacascript::void(0)" ><button type="button" class="btn btn-black w-min-xs  waves-effect waves-light yaoqing"  data-toggle="modal" data-target="#yaoqing" data-action="{{$v['id']}}" >邀请码</button></a>
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
    <div class="modal fade"  role="dialog" aria-labelledby="exampleModalLabel" id="shangji" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/user/superior')}}" id="superior">
                        {{ csrf_field() }}
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >用户名：</label>
                            <div  style="float:left; width: 350px;">

                                <select class="form-control" id="select2" style="width: 350px;height: 35px; line-height: 35px;">
                                    <option value="0">请选择</option>
                                    @foreach ($user as $v)
                                        <option value="{{$v->id}}">{{$v->username}}</option>
                                    @endforeach
                                </select>


                            </div>

                        </div>
                        <input type="hidden" value="" id="shangjiID" name="aid">
                        <input type="hidden" value="" id="select" name="val">
                        <div class="modal-footer" style="display: none;" id="sub">
                            <button type="submit" class="btn btn-primary" id="submit">提交</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="chakan" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">

                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >用户名：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control ajaxUsername" type="text" name=""  value=""  readonly>
                            </div>
                        </div>
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >手机号码：</label>
                            <div  style="float:left; width: 250px;">
                                <input class="form-control ajaxTel" type="text" name=""  value=""  readonly>
                            </div>
                        </div>
                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >创建时间：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control ajaxCreated_time" type="text" name=""  value=""  readonly>
                        </div>
                    </div>

                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >最后登录时间：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control ajaxLast_time" type="text" name=""  value=""  readonly>
                        </div>
                    </div>
                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >权限：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control ajaxAuth" type="text" name=""  value=""  readonly>
                        </div>
                    </div>
                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >等级：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control ajaxLevel" type="text" name=""  value=""  readonly>
                        </div>
                    </div>




                </div>

            </div>
        </div>
    </div>
    <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" id="bank" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                    <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/admin/sys/user/cash')}}" id="superior">
                        {{ csrf_field() }}
                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >真实姓名：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control bank_Username" type="text" name="username"  value=""  >
                        </div>
                    </div>
                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >支付宝账户：</label>
                        <div  style="float:left; width: 250px;">
                            <input class="form-control bank_userZHIFUBAO" type="text" name="userZHIFUBAO"  value=""  >
                        </div>
                    </div>
                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >公司名称：</label>
                        <div  style="float:left; width: 450px;">
                            <input class="form-control bank_company" type="text" name="company"  value=""  >
                        </div>
                    </div>

                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >公司账号：</label>
                        <div  style="float:left; width: 450px;">
                            <input class="form-control bank_companyCode" type="text" name="companyCode"  value=""  >
                        </div>
                    </div>
                    <div class="form-group h-a" style="text-align: center">
                        <label for="name" class=" col-form-label label200" >开户行：</label>
                        <div  style="float:left; width: 450px;">
                            <input class="form-control bank_bank" type="text" name="bank"  value=""  >
                        </div>
                    </div>

                    <input type="hidden" value=""  name="uid" class="bank_uid">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade"  role="dialog" aria-labelledby="exampleModalLabel" id="yaoqing" >
        <div class="modal-dialog" role="document" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-body" style="background: #fff">
                        <div class="form-group h-a" style="text-align: center">
                            <label for="name" class=" col-form-label label200" >邀请码：</label>
                            <div  style="float:left; width: 350px;">
                                <input class="form-control AjaxYaoqing" type="text" name="yaoqing"  value="" readonly >
                            </div>
                        </div>
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
        //会为符合条件的现有标签和未来标签都绑定事件（将未来标签写道on方法里）

        $(function () {
            $("body").delegate('.table-striped tr', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {

                    $.post("{{ url('/admin/sys/user/invite') }}/"+ $('.table-striped tr').eq($(this).index()+1).find('.yaoqing').data('action'),
                        {'_token': '{{ csrf_token() }}'}, function(data) {
                        console.log(data);
                            $('.AjaxYaoqing').val(data.invite);
                        });
                });
        })

    </script>
    <script>
        //会为符合条件的现有标签和未来标签都绑定事件（将未来标签写道on方法里）

        $(function () {
            $("body").delegate('.table-striped tr', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {
                    var id = $('.table-striped tr').eq($(this).index()+1).find('.bank').data('action');

                    $.post("{{ url('/admin/sys/user/bank') }}/"+ $('.table-striped tr').eq($(this).index()+1).find('.bank').data('action'),
                        {'_token': '{{ csrf_token() }}'}, function(data) {
                            $('.bank_Username').val(data.username);
                            $('.bank_userZHIFUBAO').val(data.userZHIFUBAO);
                            $('.bank_company').val(data.company);
                            $('.bank_companyCode').val(data.companyCode);
                            $('.bank_bank').val(data.bank);
                            $('.bank_uid').val(id);
                        });
                });
        })

    </script>
    <script>
        //会为符合条件的现有标签和未来标签都绑定事件（将未来标签写道on方法里）

        $(function () {
            $("body").delegate('.table-striped tr', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {

                    $.post("{{ url('/admin/sys/user/chakan') }}/"+ $('.table-striped tr').eq($(this).index()+1).find('.chakan').data('action'),
                        {'_token': '{{ csrf_token() }}'}, function(data) {
                            $('.ajaxUsername').val(data.username);
                            $('.ajaxTel').val(data.tel);
                            $('.ajaxCreated_time').val(data.create_time);
                            $('.ajaxLast_time').val(data.last_login_time);
                            if(data.auth == 3){
                                $('.ajaxAuth').val('个人代理');
                            }
                            if(data.auth == 7){
                                $('.ajaxAuth').val('省代理');
                            }
                            if(data.auth == 8){
                                $('.ajaxAuth').val('市代理');
                            }
                            if(data.auth == 9){
                                $('.ajaxAuth').val('县代理');
                            }
                            if(data.level == 1){
                                $('.ajaxLevel').val('青铜会员');
                            }
                            if(data.level == 2){
                                $('.ajaxLevel').val('白银会员');
                            }
                            if(data.level == 3){
                                $('.ajaxLevel').val('黄金会员');
                            }
                            if(data.level == 4){
                                $('.ajaxLevel').val('铂金会员');
                            }
                            if(data.level == 5){
                                $('.ajaxLevel').val('钻石会员');
                            }

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