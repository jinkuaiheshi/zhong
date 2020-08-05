@extends('header')

@section('content')
    <div class="container" >
        <div class="new_top">
            <div class="new_top_logo">
                <a href="{{url('index')}}" style="display: inline-block;width: 100%"> <img src="{{asset('resources/assets/images/loggo.png')}}" style="margin-top: 10px;" /></a>

            </div>
        </div>
        @foreach($data as $v)
        <div class="kuaixun" style="margin: 15px 0px;">
            <span>【{{$v->title}}】</span><span>{{$v->info}}</span>
        </div>

        @endforeach
        {!! $data->render() !!}
        <div style="height: 60px;width: 100%;"></div>
    </div>

@stop
