@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    修改密码

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
            <form class="form-horizontal " method="post" enctype="multipart/form-data" action="{{url('/passwordEdit')}}">
                {{ csrf_field() }}
                <div class="per-list-list brd1px">

                    <div class="per-list-list-mid ">

                        <div class="per-list-list-right wid100">
                            <input type="text" name="suppwd" value="" placeholder="原始密码" class="inpuText" required >

                        </div>
                    </div>
                </div>

                <div class="per-list-list brd1px">

                    <div class="per-list-list-mid">

                        <div class="per-list-list-right wid100" >
                            <input type="password" name="password" value="" placeholder="新密码" class="inpuText" required>
                        </div>
                    </div>
                </div>

                <div class="per-list-list brd1px">

                    <div class="per-list-list-mid">

                        <div class="per-list-list-right wid100" >
                            <input type="password" name="repassword" value="" placeholder="确认新密码" class="inpuText" required>
                        </div>
                    </div>
                </div>

                <div class="btm_wapper" style="margin-top: 20px;">
                    <input type="submit" class="btm_wapper_btn"  value="提交" />
                </div>
            </form>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>

@stop

