@extends('admin_sys_header')

@section('content')
    <div class="site-content">


        <div class="box box-block bg-white">
            <div class="form-group" style="height: auto; overflow: hidden;">

            </div>
            <table class="table table-striped table-bordered dataTable" id="tab" >
                <thead>
                <tr>
                    <td>用户名</td>
                    <th>订单编号</th>
                    <th>订单产品</th>
                    <th>创建时间</th>
                    <th>数量</th>
                    <th>单价</th>
                    <th>总价</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v->User->username}}</td>
                        <td>{{$v->code}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->created_time}}</td>
                        <td>{{$v->num}}</td>
                        <td>{{$v->UnitPrice}}</td>
                        <td>{{$v->TotalPrice}}</td>
                        <td>@if($v->status == 1)<button type="button" class="btn btn-primary w-min-xs  waves-effect waves-light" >未支付</button>@elseif($v->status == 2)<button type="button" class="btn btn-success w-min-xs  waves-effect waves-light" >已经支付</button>@endif</td>
                        <td>
                            @if($v->status == 1)<a href="{{url('order/complete').'/'.$v->id}}" ><button type="button" class="btn btn-purple w-min-xs  waves-effect waves-light zhifu"  >确定支付</button></a>@else<button type="button" class="btn btn-success w-min-xs  waves-effect waves-light "  readonly>订单完成</button>@endif
                        </td>
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