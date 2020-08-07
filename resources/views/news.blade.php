@extends('header')

@section('content')
<div class="container">
    <div class="new_top">
        <div class="new_top_logo">
           <a href="{{url('index')}}" style="display: inline-block;width: 100%"> <img src="{{asset('resources/assets/images/loggo.png')}}" style="margin-top: 10px;" /></a>

        </div>
    </div>


        <div class="swiper-container swiper1">

            <div class="swiper-wrapper">

                @foreach($img as $v)

                        <div class="swiper-slide toutiao" >
                            <a href="{{url('news/a/').'/'.$v['id']}}" style="display: inline-block;width: 100%">
                                <img src="{{$v['src']}}" class="wid100" >
                                <p>{{$v['title']}}</p>
                            </a>
                        </div>


                @endforeach


            </div>

        </div>
    <script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.js"></script>
{{--    <script>--}}
{{--        var mySwiper = new Swiper('.swiper-container', {--}}
{{--            autoplay:true,//等同于以下设置--}}
{{--            /*autoplay: {--}}
{{--              delay: 3000,--}}
{{--              stopOnLastSlide: false,--}}
{{--              disableOnInteraction: true,--}}
{{--              },*/--}}
{{--        });--}}
{{--    </script>--}}
        <div class="nav_wrapper">
            <div class="vav_wrapper_item">
                <a>
                    <div class="vav_wrapper_item_ico">
                        <img src="{{asset('resources/assets/images/libao.png')}} " />
                    </div>
                    <div class="vav_wrapper_item_name">
快讯
                    </div>

                </a>
            </div>
            <div class="vav_wrapper_item">
                <a>
                    <div class="vav_wrapper_item_ico">
                        <img src="{{asset('resources/assets/images/libao.png')}} " />
                    </div>
                    <div class="vav_wrapper_item_name">
                        快讯
                    </div>

                </a>
            </div>
            <div class="vav_wrapper_item">
                <a>
                    <div class="vav_wrapper_item_ico">
                        <img src="{{asset('resources/assets/images/libao.png')}} " />
                    </div>
                    <div class="vav_wrapper_item_name">
                        快讯
                    </div>

                </a>
            </div>
            <div class="vav_wrapper_item">
                <a>
                    <div class="vav_wrapper_item_ico">
                        <img src="{{asset('resources/assets/images/libao.png')}} " />
                    </div>
                    <div class="vav_wrapper_item_name">
                        快讯
                    </div>

                </a>
            </div>

        </div>

        <div class="box_wrapper">
            <div class="box_wrapper_title">
                <div class="box_wrapper_title_left">
                    <p>今日资讯</p>
                </div>
                <div class="box_wrapper_title_right">
                    <p><a href="{{url('/kuaixun/more')}}">查看更多</a> </p>
                </div>
            </div>

            <div class="swiper-container swiper2" >
                        <div class="swiper-wrapper">
                            @foreach($kuaixun as $v)
                            <div class="swiper-slide">
                                <p class="ticker-headline">
                                    <a href="javascript:void(0);" style="height: auto; overflow: hidden">
                                        <strong>{{$v->title}}</strong> {{str_limit($v->info,300,'....')}}</a>
                                </p>
                            </div>
                            @endforeach


                        </div>


                    </div>


            </div>


    <script>

        var swiper1 = new Swiper('.swiper1', {
            loop: true,
            //bug :解决tab栏切换嵌套swiper出现的冲突问题，添加如下两个属性即可
            observer: true,
            observeParents: true,
            autoplay:true,
        });
        var swiper2 = new Swiper('.swiper2', {
            loop: true,
            //bug :解决tab栏切换嵌套swiper出现的冲突问题，添加如下两个属性即可
            observer: true,
            observeParents: true,
            autoplay:true,
        });
    </script>

    {{--    横向导航条--}}
        <div class="line_nav">
            <div class="line_nav_list">
                @foreach($column as $v)
                <a href="#column_{{$v->id}}" data-toggle="tab" class="active">{{$v->name}}</a>
                @endforeach
            </div>

        </div>
    <div class="tab-content" style="margin-bottom: 80px;">
                    <div class="tab-pane fade in active " id="column_1" >
                        @foreach($toutiao as $v)
                                                        <a href="{{url('news/a/').'/'.$v['id']}}" style="display: inline-block; width: 100%;">
                        <div class="tab_content">

                                <div class="line_nav_body_left">
                                        <span>{{$v['title']}}</span>
                                    <div class="line_nav_body_redu">
                                        <div class="redu_item" style="padding-left: 0px;">
                                            <i class="glyphicon glyphicon-repeat"></i>
                                            <span>&nbsp;{{date('Y-m-d',strtotime($v['created_time']))}}</span>
                                        </div>
                                        <div class="redu_item" >
                                            <i class="glyphicon glyphicon-fire"></i>
                                            <span>&nbsp;{{$v['hot']}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="line_nav_body_right">
                                 <img src={{$v['src']}} />
                                </div>

                        </div>
                                                        </a>
                        @endforeach

                    </div>
        <div class="tab-pane fade in tab_content" id="column_2">
            @foreach($artive2 as $v)
                <a href="{{url('news/a/').'/'.$v['id']}}" style="display: inline-block; width: 100%;">
                <div class="tab_content">
                    <div class="line_nav_body_left">
                        <p>
                            {{$v['title']}}
                        </p>
                        <div class="line_nav_body_redu">
                            <div class="redu_item" style="padding-left: 0px;">
                                <i class="glyphicon glyphicon-repeat"></i>
                                <span>&nbsp;{{date('Y-m-d',strtotime($v['created_time']))}}</span>
                            </div>
                            <div class="redu_item" >
                                <i class="glyphicon glyphicon-fire"></i>
                                <span>&nbsp;{{$v['hot']}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="line_nav_body_right">
                        <img src={{$v['src']}} />
                    </div>
                </div>
                </a>
            @endforeach
        </div>
        <div class="tab-pane fade in tab_content" id="column_3">
            @foreach($artive3 as $v)
                <a href="{{url('news/a/').'/'.$v['id']}}" style="display: inline-block; width: 100%;">
                <div class="tab_content">
                    <div class="line_nav_body_left">
                        <p>
                            {{$v['title']}}
                        </p>
                        <div class="line_nav_body_redu">
                            <div class="redu_item" style="padding-left: 0px;">
                                <i class="glyphicon glyphicon-repeat"></i>
                                <span>&nbsp;{{date('Y-m-d',strtotime($v['created_time']))}}</span>
                            </div>
                            <div class="redu_item" >
                                <i class="glyphicon glyphicon-fire"></i>
                                <span>&nbsp;{{$v['hot']}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="line_nav_body_right">
                        <img src={{$v['src']}} />
                    </div>
                </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

@stop