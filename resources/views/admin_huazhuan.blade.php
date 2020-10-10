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
                    <th>认证姓名</th>
                    <th>支付宝账户</th>
                    <th>账户名称</th>
                    <th>银行卡号</th>
                    <th>开户行</th>
                    <th>划转数量</th>
                    <th>币价</th>
                    <th>CNY</th>

                    <th>划转类型</th>
                    <th>提交时间</th>
                    <th>审核时间</th>

                    <th>操作</th>




                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->User->username}}</td>
                        <td>{{isset($v->Realname->name)?$v->Realname->name:''}}</td>
                        <td>{{$v->Cash->userZHIFUBAO}}</td>
                        <td>{{$v->Cash->company}}</td>
                        <td>{{$v->Cash->companyCode}}</td>
                        <td>{{$v->Cash->bank}}</td>
                        <td>{{isset($v->num)?$v->num:''}}</td>
                        <td>{{isset($v->bijia)?$v->bijia:''}}</td>
                        <td>{{$v->num*$v->bijia}}</td>
                        <td>{{$v->type}}</td>
                        <td>{{$v->created_time}}</td>
                        <td>{{$v->shenhe_time}}</td>

                                                <td>
                                                    @if($v->shenhe_time)
                                                        @if($v->status == 2)
                                                        <a href="javascript:void(0)" > <button type="button" class="btn btn-purple w-min-xs  waves-effect waves-light" >审核通过划转成功</button></a>                   @elseif($v->status == 3)
                                                            <a href="javascript:void(0)" > <button type="button" class="btn btn-black w-min-xs  waves-effect waves-light" >审核失败划转失败</button></a>
                                                            @endif
                                                        @else

                                                        <a href="{{url('/admin/sys/huazhuan/success').'/'.$v->id}}" > <button type="button" class="btn btn-success success w-min-xs  waves-effect waves-light" >通过审核</button></a>
                                                        <a href="{{url('/admin/sys/huazhuan/danger').'/'.$v->id}}" > <button type="button" class="btn btn-danger danger w-min-xs  waves-effect waves-light" >审核失败</button></a>
                                                        @endif
                                                </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>
    <script>
        $(function(){

            $(".success").click(function(){
                return confirm("是否确认通过审核");
            });
            $(".danger").click(function(){
                return confirm("是否确认审核失败");
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