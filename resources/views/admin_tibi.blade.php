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
                    <th>提币地址</th>
                    <th>提币数量</th>
                    <th>提币类型</th>
                    <th>提交时间</th>
                    <th>备注信息</th>


                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v->User->username}}</td>
                        <td>{{isset($v->url)?$v->url:''}}</td>
                        <td>{{isset($v->num)?$v->num:''}}</td>
                        <td>@if($v->type == 1) BTC @elseif ($v->type == 2) ETH @else CNY @endif</td>
                        <td>{{$v->created_time}}</td>
                        <td>{{$v->info}}</td>
{{--                        <td><a href="{{url('storage/app/public/pic/').'/'.$v->pic}}" target="_blank"> <button type="button" class="btn btn-success w-min-xs  waves-effect waves-light" >查看上传凭证</button></a></td>--}}

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>
    <script>
        $(function(){

            $(".zhifu").click(function(){
                return confirm("是否确认已经支付");
            });
        });
    </script>
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