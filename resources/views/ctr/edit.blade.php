@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{url('/ctr/create')}}">客户添加</a></li>
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
<h1 align="center" style="margin-top:30px;margin-bottom:40px;">客户修改</h1>
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

<form class="form-horizontal" action="{{url('/ctr/update/'.$ctrInfo->ctr_id)}}" method="post" role="form" style="width:97%;">
@csrf
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">客户名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="ctr_name" name="ctr_name" value="{{$ctrInfo->ctr_name}}"
				   placeholder="请输入客户名称">
			<b style="color:#e63f00;">{{$errors->first("ctr_name")}}</b>
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">客户级别</label>
		<div class="col-sm-10">
			<input type="radio" name="ctr_leven" value="1" {{$ctrInfo->ctr_leven=="1" ? "checked" : ""}}>会员
			<input type="radio" name="ctr_leven" value="2" {{$ctrInfo->ctr_leven=="2" ? "checked" : ""}}>非会员
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">客户来源</label>
		<div class="col-sm-10">
			<textarea type="text" class="form-control" id="firstname"  name="ctr_ly"
				   placeholder="请输入客户来源">{{$ctrInfo->ctr_ly}}</textarea>
		</div>
	</div>
	<div class="form-group" style="width:97%;">
		<label for="firstname" class="col-sm-2 control-label">业务员名称</label>
		<div class="col-sm-10">
			<select name="sln_id" id="">
                <option value="">--请选择--</option>
                @foreach($slnInfo as $v)
                <option value="{{$v->sln_id}}"{{$ctrInfo->sln_id==$v->sln_id ? "selected" : ""}}>{{$v->sln_name}}</option>
                @endforeach
            </select>
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