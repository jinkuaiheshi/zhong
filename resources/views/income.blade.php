@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    我的收益

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

    <div class="container" style="background:#f9f9f9; height:auto;overflow: hidden; margin-bottom: 50px;">
        @foreach( $data as $v)
            <div class="title_item" style="height: auto; overflow: hidden; margin-top: 15px;">


                <div class="title_item_title">
                    名称: <p style="font-size: 14px;">{{$v->name}}</p>
                </div>
                <div class="title_item_info">
                    <div class="title_item_info_left">
                        编号:{{$v->code}}
                    </div>

                </div>
                <div class="title_item_info">
                    <div class="title_item_info_left">
                        金额:<span style="color: #f96c02">{{$v->TotalPrice}}</span>
                    </div>

                </div>

                @if($v->Product->attr == 1)
                @for($i=1;$i<4;$i++)
                    <div class="title_item_info">
                        <div class="title_item_info_left">
{{--                            第{{$i}}期:{{date("Y-m-d",strtotime("+1 month",$v->force_time))}}--}}
                            {{date('Y-m-d',strtotime('+'.$i.'month',strtotime($v->force_time)))}}
                        </div>
                        <div class="title_item_info_right red" style="font-size: 14px;font-weight: 700;" >
                           {{$v->TotalPrice*0.24/12}}元
                        </div>
                    </div>
                @endfor
                    @endif
                    @if($v->Product->attr == 2)
                    @for($i=1;$i<7;$i++)
                    <div class="title_item_info">
                        <div class="title_item_info_left">
                            {{date('Y-m-d',strtotime('+'.$i.'month',strtotime($v->force_time)))}}
                        </div>
                        <div class="title_item_info_right red" style="font-size: 14px;font-weight: 700;" >
                            {{$v->TotalPrice*0.252/12}}元
                        </div>
                    </div>
                    @endfor
                        @endif
                @if($v->Product->attr == 3)
                    @for($i=1;$i<13;$i++)
                        <div class="title_item_info">
                            <div class="title_item_info_left">
                                {{date('Y-m-d',strtotime('+'.$i.'month',strtotime($v->force_time)))}}
                            </div>
                            <div class="title_item_info_right red" style="font-size: 14px;font-weight: 700;" >
                                {{$v->TotalPrice*0.264/12}}元
                            </div>
                        </div>
                    @endfor
                    @endif
            </div>

        @endforeach
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>

@stop