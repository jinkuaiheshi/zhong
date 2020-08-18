@extends('header')

@section('content')
    <div class="container" >
        <div class="row">
            <div class="new_top">
                <div class="new_top_logo">
                    <a href="{{url('index')}}" style="display: inline-block;width: 100%"> <img src="{{asset('resources/assets/images/logo.jpg')}}" class="wid100" style="margin-bottom: 10px;"/></a>

                </div>
            </div>
        </div>


        <div class="active_item">
            <div class="active_item_title">
                <p>{{$data->title}}</p>
                <div class="news_weiget">

                    <div class="news_weiget_item" style="padding-left: 0px;">
                        <i class="glyphicon glyphicon-repeat"></i>
                        <span>&nbsp;{{$data->created_time}}</span>
                    </div>
                    <div class="news_weiget_item">
                        <i class="glyphicon glyphicon-fire"></i>
                        <span>&nbsp;{{$data->hot}}</span>
                    </div>

                </div>
            </div>

        </div>
        <div class="active_con">
            <div class="article_main">
                <p>来源: {{$data->source}}</p>
                <p>{!! $data->body !!}</p>

            </div>
            <script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.js"></script>
            <script>
                $(function () {
                    $('.article_main img').css('width','100%');
                })
            </script>
            <div class="article_state">
                <p>来源：{{$data->source}}</p>
                <p>发布人：{{$data->publisher}}</p>
                <p>声明：该文观点仅代表作者本人，不代表中外矿业立场。中外矿业系信息发布平台，仅提供信息存储空间服务。</p>
            </div>
            <div class="article_next">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{url('new/a/').'/'.$last->id}}" data-toggle="tooltip" data-original-title="class="article-prev">
                            上一篇：{{$last->title}}</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{url('new/a/').'/'.$next->id}}" data-toggle="tooltip"  class="article-next">
                            下一篇：{{$next->title}}</a>
                    </div>
                </div>
            </div>


            <div class="box_wrapper" style="margin-top: 30px;margin-bottom: 60px;">
                <div class="box_wrapper_title">
                    <div class="box_wrapper_title_left">
                        <p>新闻排行</p>
                    </div>

                </div>
                @foreach($paihang as $v)
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