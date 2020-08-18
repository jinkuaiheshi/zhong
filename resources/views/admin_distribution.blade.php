@extends('admin_sys_header')

@section('content')
    <div class="site-content">


        <div class="box box-block bg-white">
            <div class="form-group" style="height: auto; overflow: hidden;">

            </div>
            <table class="table table-striped table-bordered dataTable" id="tab" >
                <thead>
                <tr>
                    <th>用户名</th>
                    <th>创建时间</th>
                    <th>最后登录时间</th>
                    <th>实名认证</th>
                    <th>支付宝账号</th>
                    <th>绑定手机</th>

                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v->username}}</td>
                        <td>{{$v->create_time}}</td>
                        <td>{{$v->last_login_time}}</td>
                        <td>{{isset($v->Realname->name) ? $v->Realname->name : ''}}</td>
                        <td>{{isset($v->Cash->userZHIFUBAO) ? $v->Cash->userZHIFUBAO : ''}}</td>
                        <td>{{$v->tel}}</td>

                        <td></td>


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


@stop