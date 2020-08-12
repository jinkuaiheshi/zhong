@extends('pay')

@section('content')
    <div class="row">

        <div class="carousel slide" id="carousel-example-generic" data-ride="carousel" data-interval="15000" >

            <div class="carousel-inner">
                <div class="item active" style="position: relative">
                    <img src="{{asset('resources/assets/images/yaoqing.jpg')}}">
                        <p style="width: 50%; position: absolute;left: 25%; bottom: 20px; background: #0b0b0b" class="img_p">
                            <img src="{{$png}}"  class="wid100"/>
                        </p>
                </div>
                <div class="item" style="position: relative">
                    <img src="{{asset('resources/assets/images/yaoqing2.jpg')}}">
                    <p style="width: 50%; position: absolute;left: 25%; bottom: 20px; background: #0b0b0b" class="img_p">
                        <img src="{{$png}}"  class="wid100"/>
                    </p>
                </div>


            </div>

        </div>
    </div>

    <script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        $(function () {

            $.post("{{ url('/index/ajax/img') }}",
                {'_token': '{{ csrf_token() }}'}, function(data) {

                });
        })
    </script>


@stop
