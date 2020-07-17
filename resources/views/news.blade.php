@extends('header')

@section('content')
<div class="container">
    <div class="new_top">
        <div class="new_top_logo">
            <img src="" />
            <p>火讯，更快的区块链讯息</p>
        </div>
    </div>


        <div class="carousel slide" id="carousel-example-generic" data-ride="carousel" data-interval="1500">

            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{asset('resources/assets/images/slide.png')}}">
                </div>
                <div class="item">
                    <img src="{{asset('resources/assets/images/slide11.png')}}">
                </div>
                <div class="item">
                    <img src="{{asset('resources/assets/images/slide22.png')}}">
                </div>

            </div>

        </div>
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
                    <a href="">更多</a>
                </div>
            </div>

            <div id="carousel-example-vertical" class="carousel vertical slide" data-interval="3000" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <p class="ticker-headline">
                                    <a href="#">
                                        <strong>Article Headline 1</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras luctus eu odio fermentum tempus. Aliquam erat volutpat. Etiam arcu urna, lacinia sed dapibus sed, molestie ac mi.
                                    </a>
                                </p>
                            </div>
                            <div class="item">
                                <p class="ticker-headline">
                                    <a href="#">
                                        <strong>Article Headline 2</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras luctus eu odio fermentum tempus. Aliquam erat volutpat. Etiam arcu urna, lacinia sed dapibus sed, molestie ac mi.
                                    </a>
                                </p>
                            </div>
                            <div class="item">
                                <p class="ticker-headline">
                                    <a href="#">
                                        <strong>Article Headline 3</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras luctus eu odio fermentum tempus. Aliquam erat volutpat. Etiam arcu urna, lacinia sed dapibus sed, molestie ac mi.
                                    </a>
                                </p>
                            </div>
                            <div class="item">
                                <p class="ticker-headline">
                                    <a href="#">
                                        <strong>Article Headline 4</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras luctus eu odio fermentum tempus. Aliquam erat volutpat. Etiam arcu urna, lacinia sed dapibus sed, molestie ac mi.
                                    </a>
                                </p>
                            </div>
                            <div class="item">
                                <p class="ticker-headline">
                                    <a href="#">
                                        <strong>Article Headline 5</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras luctus eu odio fermentum tempus. Aliquam erat volutpat. Etiam arcu urna, lacinia sed dapibus sed, molestie ac mi.
                                    </a>
                                </p>
                            </div>
                        </div>


                    </div>


            </div>

{{--    横向导航条--}}
        <div class="line_nav">
            <div class="line_nav_list">
                @foreach($column as $v)
                <a href="column_{{$v->id}}" data-toggle="tab" class="active">{{$v->name}}</a>
                @endforeach
            </div>

        </div>
    <div class="tab-content">
                    <div class="tab-pane fade in active " id="toutiao" >
                        <div class="tab_content">
                            <div class="line_nav_body_left">
                                <a href="">
                                    <p>
                                        对COMP通证经济模型的一般性评价性评价
                                    </p>
                                </a>
                                <div class="line_nav_body_redu">
                                    <div class="redu_item">
                                        <i class="glyphicon glyphicon-fire"></i>
                                        <span>&nbsp;60分钟前</span>
                                    </div>
                                    <div class="redu_item">
                                        <i class="glyphicon glyphicon-fire"></i>
                                        <span>&nbsp;9999</span>
                                    </div>
                                </div>
                            </div>

                            <div class="line_nav_body_right">
                                <a href="" > <img src={{asset('resources/assets/images/pic.jpg')}} /></a>
                            </div>
                        </div>
                        <div class="tab_content">
                            <div class="line_nav_body_left">
                                <a href="">
                                    <p>
                                        对COMP通证经济模型的一般性评价性评价
                                    </p>
                                </a>
                                <div class="line_nav_body_redu">
                                    <div class="redu_item">
                                        <i class="glyphicon glyphicon-fire"></i>
                                        <span>&nbsp;60分钟前</span>
                                    </div>
                                    <div class="redu_item">
                                        <i class="glyphicon glyphicon-fire"></i>
                                        <span>&nbsp;9999</span>
                                    </div>
                                </div>
                            </div>
                            <div class="line_nav_body_right">
                                <a href="" > <img src={{asset('resources/assets/images/pic.jpg')}} /></a>
                            </div>
                        </div>
                    </div>
        <div class="tab-pane fade in tab_content" id="langyabang">
            <div class="tab_content">
                <div class="line_nav_body_left">
                    <a href="">
                        <p>
                            对COMP通证经济模型的一般性评价性评价
                        </p>
                    </a>
                    <div class="line_nav_body_redu">
                        <div class="redu_item">
                            <i class="glyphicon glyphicon-fire"></i>
                            <span>&nbsp;60分钟前</span>
                        </div>
                        <div class="redu_item">
                            <i class="glyphicon glyphicon-fire"></i>
                            <span>&nbsp;9999</span>
                        </div>
                    </div>
                </div>
                <div class="line_nav_body_right">
                    <a href="" > <img src={{asset('resources/assets/images/pic.jpg')}} /></a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop