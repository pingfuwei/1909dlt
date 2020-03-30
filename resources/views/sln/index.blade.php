@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{url('/sln/create')}}">业务员添加</a></li>
                    <li class="active"><a href="{{url('/sln/index')}}">业务员列表</a></li>
                    <!-- <li><a href="{{url('/sln/edit')}}">业务员修改</a></li> -->
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bootstrap 实例 - 响应式表格</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h1 align="center" style="margin-top:30px;margin-bottom:40px;">业务员展示</h1>
<div class="table-responsive" style="margin-top:110px;">
	<form action="{{url('/sln/index')}}">
		<input type="text" name="name" value="{{$name??''}}" placeholder="请输入业务员名称">
		<input type="submit" value="搜索">
	</form>
	<table class="table">
		<thead>
			<tr>
				<th style="padding-left:20px;">业务员id</th>
				<th>业务员名称</th>
				<th>业务员性别</th>
				<th>业务员电话</th>
				<th>业务员手机号</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
        @foreach ($slnInfo as $v)
			<tr sln_id = "{{$v->sln_id}}">
				<th style="padding-left:20px;">{{$v->sln_id}}</th>
				<th>
                    <span class="span_name">{{$v->sln_name}}</span>
                </th>
				<th>{{$v->sln_sex=="1" ? "男" : "女"}}</th>
				<th>{{$v->sln_tels}}</th>
				<th>{{$v->sln_tel}}</th>
				<th>
                <a href="{{url('/sln/edit/'.$v->sln_id)}}" class="btn btn-info">编辑</a>
                <a href="javascript:void(0);" class="btn btn-danger del">删除</a>
                </th>
			</tr>
        @endforeach
		<tr><td colspan="6">{{$slnInfo->appends(["name"=>$name])->links()}}</td></tr>
		</tbody>
</table>
</div>  	

</body>
</html>

<script>
$(function(){
    //给分页的每个a标签增加点击事件
    $(document).on("click",".pagination a",function(){
        //回去点击的a标签的href中的地址
        var url = $(this).attr("href");
        // alert(url);
        //将获取的href中的地址使用Ajax传给控制器
        $.get(url,function(res){
            // alert(res);
            //返回的数据放回tbody中
            $("tbody").html(res);
        })
        //让路径关闭
        return false;
    })
    //是否删除
    $(document).on("click",".del",function(){
        var sid = $(this).parents("tr").attr("sln_id");
        // alert(sid);
        if(confirm("是否确认要删除？")){
            $.get(
                "/sln/destroy/"+sid,
                function(res){
                    // alert(res);
                    if(res.code=="00000"){
                        location.reload();
                        alert(res.msg);
                    }else{
                        alert("删除失败");
                    }
                },"json"
            )
        }
    })
    //即点即改
    $(document).on("click",".span_name",function(){
        // alert("123");
        var name = $(this).text();
        // alert(name);
        $(this).parent().html("<input type='text' class='input_name' value="+name+">");

    })
    $(document).on("blur",".input_name",function(){
        // alert("123");
        var obj = $(this);
        var new_name = $(this).val();
        // alert(new_name);
        var id = $(this).parents("tr").attr("sln_id");
        // alert(id);
        $.get(
            "/sln/ajaxunp",
            {id:id,new_name:new_name},
            function(res){
                // alert(res);
                if(res.code==00000){
                    obj.parent().html("<span class='span_name'>"+new_name+"</span>"); 
                }
            },"json"
        )
    })
})
</script>
@endsection