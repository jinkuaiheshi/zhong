@extends('header')

@section('content')
    <div class="container">
        <div class="title_wrapper">
            <div class="nav">
                <div class="nav_title">
                    平台公告

                </div>
                <div class="nav_nav">
                    <a href="{{url()->previous()}}" style="color:#999">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        <span style="color:#333">返回</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="pingtai">
            <div class="pingtai-title">
                <p>平台公告</p>
            </div>
            <div class="pingtai-info">
                2020年7月29号，我们迎来了一个重要时刻——中外矿业有限公司与江油市雄峰电力开发限公司的入股签约仪式隆重举行，这标志着中外矿业与雄峰电力将共同携手，共创未来。也意味着中外矿业对推动千亿级区块链全生态产业链的落地迈出了重要的一步，奠定了坚实的基础。
            </div>
        </div>
    </div>

@stop
