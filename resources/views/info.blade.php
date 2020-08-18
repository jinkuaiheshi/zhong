@extends('pay')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    详细介绍
                </div>
                <div class="nav_nav">
                    <a href="{{url('index')}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="info_pic">
                <img src="{{url('/storage/app/public/pic').'/'.$product->pic}}" />
            </div>

        </div>
        <div class="info_title">
            {{$product->name}}
        </div>
        <input type="hidden" class="productID" value="{{$product->id}}">
        @if(Session::get('indexlogin'))
        <input type="hidden" class="uid" value="{{Session::get('indexlogin')->id}}">
        @endif
        <div class="form-group margin_10"  style="height: auto; overflow: hidden">
            <div class="col-xs-3 padding_0 " >
                <label for="order" class=" info_stit" >功耗：</label>
            </div>
            <div class="col-xs-6 padding_0">
                    {{$product->power}}
            </div>
        </div>
        <div class="form-group margin_10"  style="height: auto; overflow: hidden">
            <div class="col-xs-3 padding_0 " >
                <label for="order" class=" info_stit" >本批剩余：</label>
            </div>
            <div class="col-xs-6 padding_0">
                {{$product->stock}}
            </div>
        </div>
        <div class="form-group margin_10"  style="height: auto; overflow: hidden">
            <div class="col-xs-3 padding_0 " >
                <label for="order" class=" info_stit" >产品期限：</label>
            </div>
            <div class="col-xs-6 padding_0">
                @if($product->attr == 1)三个月
                @elseif($product->attr == 2)六个月
                @elseif($product->attr == 3)十二个月
                    @endif
            </div>
        </div>
        <div class="form-group margin_10"  style="height: auto; overflow: hidden">
            <div class="col-xs-3 padding_0 " >
                <label for="order" class=" info_stit" >算力：</label>
            </div>
            <div class="col-xs-6 padding_0">
                {{$product->computerPower}}
            </div>
        </div>
        <div class="form-group margin_10"  style="height: auto; overflow: hidden">
            <div class="col-xs-3 padding_0 " >
                <label for="order" class=" info_stit" >产品回报率：</label>
            </div>
            <div class="col-xs-6 padding_0">
                @if($product->attr == 1&&$product->model == 5)100CNY/月
                @elseif($product->attr == 2)25.2%=2646元/份
                @elseif($product->attr == 3)26.4%=5544元/份
                @elseif($product->attr == 1 ||$product->model == 5)24%=1260元/份
                @endif
            </div>
        </div>
        <div class="form-group margin_10"  style="height: auto; overflow: hidden">
            <div class="col-xs-3 padding_0 " >
                <label for="order" class=" info_stit" >数量：</label>
            </div>
            <div class="col-xs-9 padding_0" id="price_num">
                <svg width="32px" height="32px" viewBox="0 0 16 16" class="bi bi-file-minus min" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="float: left; margin-left: 10px;" >
                    <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
                    <path fill-rule="evenodd" d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <p  name="" type="text"  style="float: left" class="price_p" >1</p>

                <svg width="32px" height="32px" viewBox="0 0 16 16" class="bi bi-file-plus add" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="float: left; margin-right: 10px;">
                    <path fill-rule="evenodd" d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4z"/>
                    <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </div>
        </div>
        <div class="form-group margin_10"  style="height: auto; overflow: hidden">

            <div class="col-xs-6 padding_0 price" id="total">
                {{$product->price}}
            </div>
        </div>

        <div style="margin-bottom: 80px;">
            {!! $product->info !!}
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script>
        $(function () {
            $(".add").click(function(){
                var t =$(this).parent().find('.price_p');

                t.html(parseInt(t.html())+1)
                setTotal();
            })
            $(".min").click(function(){

                var t=$(this).parent().find('.price_p');
                t.html(parseInt(t.html())-1)
                if(parseInt(t.html())<0){
                    t.html(0);
                }
                setTotal();
            })

            function setTotal(){
                var s=0;
                $("#price_num ").each(function(){

                    s+={{$product->price}}*parseFloat($(this).find('.price_p').text());
                });
                $("#total").html(s.toFixed(2));
            }
            setTotal();

        })
    </script>
    <footer class="footer-fixed">
        <a href="{{url('order').'/'.$product->id}}" class="btm_wapper_btn pay">立即购买</a>
    </footer>

    <script>
        //会为符合条件的现有标签和未来标签都绑定事件（将未来标签写道on方法里）

        $(function () {
            $("body").delegate('.pay', //会为符合条件的现有标签和未来标签都绑定事件
                'click', function () {

                    $.post("{{ url('/product/order/info') }}/"+ $('.productID').val(),
                        {'_token': '{{ csrf_token() }}',
                            'car':$('.price_p').html()
                        }, function(data) {

                        });

                });
        })

    </script>
@stop