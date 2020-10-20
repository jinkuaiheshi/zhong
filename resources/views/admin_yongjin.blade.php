@extends('admin_sys_header')

@section('content')
    <div class="site-content">


        <div class="box box-block bg-white">
            <div class="form-group" style="height: auto; overflow: hidden;">

            </div>
            <table class="table table-striped table-bordered dataTable" id="tab" >
                <thead>
                <tr>

                    <th>订单号</th>
                    <th>订单名称</th>
                    <th>订单购买人</th>
                    <th>上级佣金者</th>
                    <th>上级佣金者等级</th>
                    <th>佣金</th>


                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>

                        <td>{{$v['order']}}</td>
                        <td>{{$v['name']}}</td>
                        <td>{{$v['uid']}}</td>
                        <td>{{$v['top']}}</td>
                        <td>{{$v['topLevel']}}</td>
                        <td>{{$v['yongjin']}}</td>

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
