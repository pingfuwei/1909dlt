@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="{{url('/ctr/create')}}">客户添加</a></li>
                    <li><a href="{{url('/ctr/index')}}">客户列表</a></li>
                    <!-- <li><a href="{{url('/ctr/edit')}}">客户修改</a></li> -->
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
<h1 align="center" style="margin-top:30px;margin-bottom:40px;">客户添加</h1>
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

<form class="form-horizontal" action="{{url('/ctr/store')}}" method="post" role="form" style="width:97%;">
@csrf
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">客户名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="ctr_name" name="ctr_name" 
				   placeholder="请输入客户名称">
			<b style="color:#e63f00;">{{$errors->first("ctr_name")}}</b>
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">客户级别</label>
		<div class="col-sm-10">
			<input type="radio" name="ctr_leven" value="1" checked>会员
			<input type="radio" name="ctr_leven" value="2">非会员
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">客户来源</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control" id="firstname"  name="ctr_ly"
				   placeholder="请输入客户来源"></textarea>
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">业务员名称</label>
		<div class="col-sm-10">
			<select name="sln_id" id="">
                <option value="">--请选择--</option>
                @foreach($slnInfo as $v)
                <option value="{{$v->sln_id}}">{{$v->sln_name}}</option>
                @endforeach
            </select>
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
    $(document).on("blur","#ctr_name",function(){
        // alert("123");
        var sname = $(this).val();
        // alert(sname);
        var sga = /^[\u4e00-\u9fa5,a-zA-Z0-9]{2,5}$/;
        if(sname==""){
            $(this).next("b").text("客户名称不能为空");
        }else  if(!sga.test(sname)){
            $(this).next("b").text("客户名称由中文、字母、数字2-5位");
        }else{
            $.get(
                "/ctr/ajaxName",
                {sname:sname},
                function(res){
                    if(res=="no"){
                        $("#ctr_name").next("b").text("该客户名称已存在");
                    }else{
                        $("#ctr_name").next("b").html("<font color='green'>√</font>");
                    }
                }
            )
        }
    })
    $(document).on("click","button",function(){
        //业务员名称
        // alert("123");
        var nameflag = true;
        var sname = $("#ctr_name").val();
        // alert(sname);
        var sga = /^[\u4e00-\u9fa5,a-zA-Z0-9]{2,5}$/;
        if(sname==""){
            // alert(123);
            $("#ctr_name").next("b").text("客户名称不能为空");
            return false;
        }else  if(!sga.test(sname)){
            $("#ctr_name").next("b").text("客户名称由中文、字母、数字2-5位");
            return false;
        }else{
            $.get(
                "/ctr/ajaxName",
                {sname:sname},
                function(res){
                    if(res=="no"){
                        $("#ctr_name").next("b").text("该客户名称已存在");
                        nameflag = false;
                    }
                }
            )
            if(!nameflag){
				return false;
			}
        }
        
    })
})
</script>
@endsection