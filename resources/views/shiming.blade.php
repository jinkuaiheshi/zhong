@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    实名认证

                </div>
                <div class="nav_nav">
                    <a href="{{url('personal')}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="background:#f9f9f9; height:auto;overflow: hidden; margin-bottom: 50px;">
        <div class="row">
            <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/shiming')}}">
                {{ csrf_field() }}
            <div class="per-list-list brd1px">

                <div class="per-list-list-mid ">

                    <div class="per-list-list-right wid100">
                        <input type="text" name="name" value="{{isset($data->name)?$data->name:''}}" placeholder="真实姓名" class="inpuText" @if(isset($data->name)) readonly @endif>

                    </div>
                </div>
            </div>

            <div class="per-list-list brd1px">

                <div class="per-list-list-mid">

                    <div class="per-list-list-right wid100" >
                        <input type="text" name="code" value="{{isset($data->code)?$data->code:''}}" placeholder="证件号码" class="inpuText" @if(isset($data->code)) readonly @endif>
                    </div>
                </div>
            </div>
                <div class="btm_wapper" style="margin-top: 20px;">
                  <input type="submit" class="btm_wapper_btn"  value="提交认证" @if(isset($data->code)) disabled @endif/>
                </div>
            </form>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>

@stop

