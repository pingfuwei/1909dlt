<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 一个简单的网页</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>
<body>
{{--{{dd(request()->route()->getAction()["uses"])}}--}}
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color: #00b0e8">后台管理系统</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" id="test">
                @if(request()->route()->getAction()["uses"]=="App\Http\Controllers\AdminController@create")
                    <li style="background: gold"><a href="{{url('admin/create')}}">管理员模块</a></li>
                @else
                    <li ><a href="{{url('admin/create')}}">管理员模块</a></li>
                @endif
                @if(request()->route()->getAction()["uses"]=="App\Http\Controllers\BrandController@create")
<<<<<<< HEAD
                    <li style="background: gold"><a href="{{url('/sln/create')}}">业务员模块</a></li>
                @else
                    <li><a href="{{url('/sln/create')}}">业务员模块</a></li>
                @endif
                @if(request()->route()->getAction()["uses"]=="App\Http\Controllers\CategoryController@create")
                    <li style="background:gold"><a href="{{url('/ctr/create')}}">客户模块</a></li>
                @else
                    <li ><a href="{{url('/ctr/create')}}">客户模块</a></li>
                @endif
                @if(request()->route()->getAction()["uses"]=="App\Http\Controllers\GoodsController@create")
                    <li style="background: gold"><a href="{{url('goods/create')}}">拜访会议模块</a></li>
                @else
                    <li ><a href="{{url('goods/create')}}">拜访会议模块</a></li>
=======
                    <li style="background: gold"><a href="{{url('brand/create')}}">业务员模块</a></li>
                @else
                    <li><a href="{{url('brand/create')}}">业务员模块</a></li>
                @endif
                @if(request()->route()->getAction()["uses"]=="App\Http\Controllers\CategoryController@create")
                    <li style="background:gold"><a href="{{url('Category/create')}}">客户模块</a></li>
                @else
                    <li ><a href="{{url('Category/create')}}">客户模块</a></li>
                @endif
                @if(request()->route()->getAction()["uses"]=="App\Http\Controllers\GoodsController@create")
                    <li style="background: gold"><a href="{{url('acc/create')}}">拜访会议模块</a></li>
                @else
                    <li ><a href="{{url('acc/create')}}">拜访会议模块</a></li>
>>>>>>> 77a020a967d5b7ee5e4793ae8028986d93b172ef
                @endif
            </ul>
            <img src="/8.jpg" width="50" height="50" style="float: right" alt="">
            <font style="padding-top: 15px;float: right;color: #ffffff">欢迎<b style="color: gold;">{{session("admin_name")}}</b>登陆后台系统</font>
            <font style="padding-top: 15px;float: right;color: #ffffff">---<a href="{{url('login/index')}}">首页</a>---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
            <font style="padding-top: 15px;float: right;color: #ffffff">---<a href="{{url('login/quit')}}" style="color: red">退出</a>---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
        </div>
    </div>
</nav>


@yield('content')

</body>
</html>

<script>
//    $(function () {
//        $(document).on("click",".navbar-nav li",function () {
//            var _this=$(this);
//            console.log(_this);
//            _this.addClass("active");
//        })
//    })
//$(function(){
//
//    $("#test li").click(function() {
//
//        $(this).siblings('li').removeClass('active');  // 删除其他兄弟元素的样式
//
//        $(this).addClass('active');                            // 添加当前元素的样式
//
//    });
//
//});
</script>