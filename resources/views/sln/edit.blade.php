@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="{{url('/sln/create')}}">业务员添加</a></li>
                    <li><a href="{{url('/sln/index')}}">业务员列表</a></li>
                    <!-- <li><a href="{{url('/sln/edit/')}}">业务员修改</a></li> -->
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
<h1 align="center" style="margin-top:30px;margin-bottom:40px;">业务员修改</h1>
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

<form class="form-horizontal" action="{{url('/sln/update/'.$slnInfo->sln_id)}}" method="post" role="form" style="width:97%;">
@csrf
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">业务员名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="sln_name" name="sln_name" value="{{$slnInfo->sln_name}}"
				   placeholder="请输入业务员名称">
			<b style="color:#e63f00;">{{$errors->first("sln_name")}}</b>
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">业务员性别</label>
		<div class="col-sm-10">
			<input type="radio" name="sln_sex" value="1" {{$slnInfo->sln_sex=="1" ? "checked" : ""}}>男
			<input type="radio" name="sln_sex" value="2" {{$slnInfo->sln_sex=="2" ? "checked" : ""}}>女
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">业务员电话</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname"  name="sln_tels" value="{{$slnInfo->sln_tels}}"
				   placeholder="请输入业务员电话">
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">业务员手机号</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="sln_tel" name="sln_tel" value="{{$slnInfo->sln_tel}}" placeholder="请输入业务员手机号">
			<b style="color:#e63f00;">{{$errors->first("sln_tel")}}</b>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" id="sub" class="btn btn-default">修改</button>
		</div>
	</div>
</form>
</div>

</body>
</html>

@endsection