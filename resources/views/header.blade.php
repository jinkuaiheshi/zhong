<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('resources/assets/css/css.css')}}" rel="stylesheet">
    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@yield('content')

<footer class="footer-fixed">
    <div class="van-tabbar-item">
        <a href="{{url('index')}}" style="width: 100%; display: inline-block; color: #666;text-align: center">
        <div class="van-tabbar-item-top">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-badge-tm" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 24px;">
                <path d="M5.295 11V5.995H7V5H2.403v.994h1.701V11h1.19zm3.397 0V7.01h.058l1.428 3.239h.773l1.42-3.24h.057V11H13.5V5.001h-1.2l-1.71 3.894h-.039l-1.71-3.894H7.634V11h1.06z"/>
                <path fill-rule="evenodd" d="M14 3H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
            </svg>
        </div>
        <div class="van-tabbar-item-text">
            首页
        </div>
        </a>
    </div>
    <div class="van-tabbar-item">
        <a href="{{url('invite')}}" style="width: 100%; display: inline-block; color: #666;text-align: center">
        <div class="van-tabbar-item-top">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-badge-tm" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 24px;">
                <path d="M5.295 11V5.995H7V5H2.403v.994h1.701V11h1.19zm3.397 0V7.01h.058l1.428 3.239h.773l1.42-3.24h.057V11H13.5V5.001h-1.2l-1.71 3.894h-.039l-1.71-3.894H7.634V11h1.06z"/>
                <path fill-rule="evenodd" d="M14 3H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
            </svg>
        </div>
        <div class="van-tabbar-item-text">
            邀请
        </div>
        </a>
    </div>
    <div class="van-tabbar-item">
        <a href="{{url('news')}}" style="width: 100%; display: inline-block; color: #666;text-align: center">
        <div class="van-tabbar-item-top">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-badge-tm" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 24px;">
                <path d="M5.295 11V5.995H7V5H2.403v.994h1.701V11h1.19zm3.397 0V7.01h.058l1.428 3.239h.773l1.42-3.24h.057V11H13.5V5.001h-1.2l-1.71 3.894h-.039l-1.71-3.894H7.634V11h1.06z"/>
                <path fill-rule="evenodd" d="M14 3H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
            </svg>
        </div>
        <div class="van-tabbar-item-text">
            资讯
        </div>
        </a>
    </div>
    <div class="van-tabbar-item">
        <a href="{{url('personal')}}" style="width: 100%; display: inline-block; color: #666;text-align: center">
        <div class="van-tabbar-item-top">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-badge-tm" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="font-size: 24px;">
                <path d="M5.295 11V5.995H7V5H2.403v.994h1.701V11h1.19zm3.397 0V7.01h.058l1.428 3.239h.773l1.42-3.24h.057V11H13.5V5.001h-1.2l-1.71 3.894h-.039l-1.71-3.894H7.634V11h1.06z"/>
                <path fill-rule="evenodd" d="M14 3H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
            </svg>
        </div>
        <div class="van-tabbar-item-text">
            我的
        </div>
        </a>
    </div>
</footer>
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>



</body>
</html>
