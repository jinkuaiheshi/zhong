@extends('pay')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    订单支付

                </div>
                <div class="nav_nav">
                    <a href="{{url()->previous()}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/order/up')}}">
            {{ csrf_field() }}
        <div class="order_line">
            <div class="order_left">
                订单信息
            </div>
            <div class="order_right">
                <input type="text" value="{{$data->name}}" class="order_inp" readonly size="{{strlen($data->name)}}" name = 'name'>
                <input type="hidden" value="{{$data->id}}"  name = 'id'>
            </div>
        </div>
        <div class="order_line">
            <div class="order_left">
                订单编号
            </div>
            <div class="order_right">
                <input type="text" value="{{date('Ymdhis',time()).rand(0000,9999)}}" class="order_inp" readonly size="20" name="code">
            </div>
        </div>
        <div class="order_line">
            <div class="order_left">
                下单时间
            </div>
            <div class="order_right">
                <input type="text" value="{{date('Y-m-d h:i:s',time())}}" class="order_inp" readonly size="20" name="created_time">
            </div>
        </div>
        <div class="order_line">
            <div class="order_left">
                购买数量
            </div>
            <div class="order_right">
                <input type="text" value="{{Session::get('car')}}" class="order_inp" readonly size="20" name="num">
            </div>
        </div>
            @if($data->model != 3)
        <div class="order_line">
            <div class="order_left">
                算力总量
            </div>
            <div class="order_right">
                <input type="text" value="@if($data->id ==18){{strstr($data->computerPower,'TH/s',true)*Session::get('car').'TH/s'}}@elseif($data->id ==19){{strstr($data->computerPower,'MH/s',true)*Session::get('car').'MH/s'}}@else{{strstr($data->computerPower,'TH/s',true)*Session::get('car').'TH/s'}}@endif" class="order_inp" readonly size="20">
            </div>
        </div>
            @endif
        <div class="order_line">
            <div class="order_left">
                套餐单价
            </div>
            <div class="order_right">
                <input type="text" value="{{$data->price}}" class="order_inp red" readonly size="20" name="UnitPrice">
            </div>
        </div>
            <div class="order_line">
                <div class="order_left">
                    电费
                </div>
                <div class="order_right">
                    <input type="text" value="@if($data->model!=4 &&  $data->id !=16 && $data->id !=17)免费
@elseif($data->model == 3 && $data->id ==16 ) {{15*Session::get('car')}} @elseif($data->model == 3 && $data->id ==17 ){{39*Session::get('car')}} @elseif($data->id==18){{352.2*Session::get('car')}} @elseif($data->id==19) {{399*Session::get('car')}}@endif" class="order_inp red" readonly size="20">
                </div>
            </div>
{{--        <div class="order_line">--}}
{{--            <div class="order_left">--}}
{{--                套餐总价--}}
{{--            </div>--}}
{{--            <div class="order_right">--}}
{{--                <input type="text" value="{{$data->price*Session::get('car')}}" class="order_inp red" readonly size="20" name="TotalPrice">--}}
{{--            </div>--}}
{{--        </div>--}}

                    <div class="order_line">
                        <div class="order_left">
                            套餐总价
                        </div>
                        <div class="order_right">
                            <input type="text" value="@if($data->model == 3 && $data->id ==16 ){{$data->price*Session::get('car')+15*Session::get('car')}}@elseif($data->model == 3 && $data->id ==17 ){{$data->price*Session::get('car')+39*Session::get('car')}}@elseif($data->id==18){{$data->price*Session::get('car')+352.2*Session::get('car')}} @elseif($data->id==19) {{$data->price*Session::get('car')+399*Session::get('car')}}@else{{$data->price*Session::get('car')}}@endif " class="order_inp red" readonly size="20" name="TotalPrice">
                        </div>
                    </div>

            @if($data->model != 3 && $data->model != 4)
        <div class="order_line">
            <div class="order_left">
                产出回报
            </div>
            <div class="order_right">
                <input type="text" value="@if($data->attr == 1 && $data->model == 1){{'1260'*Session::get('car')}}@elseif($data->attr == 1 && $data->model == 2){{'94.5'*Session::get('car')}}@elseif($data->attr == 1 && $data->model != 2 &&$data->model != 5){{'1260'*Session::get('car')}}@elseif($data->attr == 1 && $data->model == 5){{'300'}}@elseif($data->attr == 2 && $data->model == 1){{'2646'*Session::get('car')}}@elseif($data->attr == 2 && $data->model == 2){{'226.8'*Session::get('car')}}@elseif($data->attr == 2 && $data->model > 2  ){{'2646'*Session::get('car')}}@elseif($data->attr == 3 && $data->model == 1){{'5544'*Session::get('car')}}@elseif($data->attr == 3 && $data->model == 2){{'504'*Session::get('car')}}@elseif($data->attr == 3 && $data->model  > 2){{'5544'*Session::get('car')}}@endif"
                         class="order_inp red" readonly size="20">
            </div>
        </div>
            @endif
            <footer class="footer-fixed">
                <input type="submit" class="btm_wapper_btn pay" value="提交订单">
            </footer>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>

@stop