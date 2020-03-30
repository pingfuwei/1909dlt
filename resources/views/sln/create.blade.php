@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="{{url('/sln/create')}}">业务员添加</a></li>
                    <li><a href="{{url('/sln/index')}}">业务员列表</a></li>
                    <!-- <li><a href="{{url('/sln/edit')}}">业务员修改</a></li> -->
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h1 align="center" style="margin-top:30px;margin-bottom:40px;">业务员添加</h1>
<div style="margin-top:110px;">

<!-- @if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif -->

<form class="form-horizontal" action="{{url('/sln/store')}}" method="post" role="form" style="width:97%;">
@csrf
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">业务员名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="sln_name" name="sln_name" 
				   placeholder="请输入业务员名称">
			<b style="color:#e63f00;">{{$errors->first("sln_name")}}</b>
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">业务员性别</label>
		<div class="col-sm-10">
			<input type="radio" name="sln_sex" value="1" checked>男
			<input type="radio" name="sln_sex" value="2">女
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">业务员电话</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname"  name="sln_tels"
				   placeholder="请输入业务员电话">
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">业务员手机号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="sln_tel" name="sln_tel" placeholder="请输入业务员手机号">
			<b style="color:#e63f00;">{{$errors->first("sln_tel")}}</b>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" id="sub" class="btn btn-default">添加</button>
		</div>
	</div>
</form>
</div>

</body>
</html>
<script>
$(function(){
    $(document).on("blur","#sln_name",function(){
        // alert("123");
        var sname = $(this).val();
        // alert(sname);
        var sga = /^[\u4e00-\u9fa5,a-zA-Z0-9]{2,5}$/;
        if(sname==""){
            $(this).next("b").text("业务员名称不能为空");
        }else  if(!sga.test(sname)){
            $(this).next("b").text("业务员名称由中文、字母、数字2-5位");
        }else{
            $.get(
                "/sln/ajaxName",
                {sname:sname},
                function(res){
                    if(res=="no"){
                        $("#sln_name").next("b").text("该业务名称已存在");
                    }else{
                        $("#sln_name").next("b").html("<font color='green'>√</font>");
                    }
                }
            )
        }
    })
    $(document).on("blur","#sln_tel",function(){
        // alert("123");
        var stel = $(this).val();
        // alert(stel);
        var ags = /^1[356789]\d{9}$/;
        if(stel==""){
            $(this).next("b").text("业务手机号不能为空");
        }else if(!ags.test(stel)){
            $(this).next("b").text("业务手机号格式不正确");
        }else{
            $("#sln_tel").next("b").html("<font color='green'>√</font>");
        }
    })
    $(document).on("click","button",function(){
        //业务员名称
        // alert("123");
        var nameflag = true;
        var sname = $("#sln_name").val();
        // alert(sname);
        var sga = /^[\u4e00-\u9fa5,a-zA-Z0-9]{2,5}$/;
        if(sname==""){
            // alert(123);
            $("#sln_name").next("b").text("业务员名称不能为空");
            return false;
        }else  if(!sga.test(sname)){
            $("#sln_name").next("b").text("业务员名称由中文、字母、数字2-5位");
            return false;
        }else{
            $.get(
                "/sln/ajaxName",
                {sname:sname},
                function(res){
                    if(res=="no"){
                        $("#sln_name").next("b").text("该业务名称已存在");
                        nameflag = false;
                    }
                }
            )
            if(!nameflag){
				return false;
			}
        }
        //验证手机号
        var stel = $("#sln_tel").val();
        // alert(stel);
        var ags = /^1[356789]\d{9}$/;
        if(stel==""){
            $("#sln_tel").next("b").text("业务手机号不能为空");
            return false;
        }else if(!ags.test(stel)){
            $("#sln_tel").next("b").text("业务手机号格式不正确");
            return false;
        }
    })
})
</script>
@endsection