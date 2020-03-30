@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="{{url('acc/create')}}">拜访会议添加</a></li>
                    <li><a href="{{url('acc/index')}}">拜访会议列表</a></li>
                    {{--<li><a href="{{url('acc/edit')}}">拜访会议修改</a></li>--}}
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">
<body>
<table class="table table-condensed">
<form>
<input type="text" name="acc_man" placeholder="请输入访问人" value="{{$query['acc_man']??''}}">
<input type="submit" value="搜索">
</form>
	<thead>
		<tr>
			<th>拜访id</th>
			<th>业务员名称</th>
			<th>客户名称</th>
            <th>拜访人</th>
            <th>拜访时间</th>
			<th>拜访地址</th>
            <th>下次拜访时间</th>
			<th>拜访详情</th>
            <th>操作</th>
		</tr>
	</thead>
	<touch>
        @foreach($acc as $v)
		<tr acc_id="{{$v->acc_id}}">
			<td>{{$v->acc_id}}</td>
			<td>{{$v->sln_name}}</td>
			<td>{{$v->ctr_name}}</td>
            <td>
                <span class="acc_man">{{$v->acc_man}}</span>
            </td>
            <td>@php echo date("Y-m-d H:i:s",$v->acc_time)@endphp</td>
            <td>{{$v->acc_addre}}</td>
            <td>{{$v->acc_times}}</td>
            <td>{{$v->acc_list}}</td>
			<td>
                 <a href="{{url('/acc/edit/'.$v->acc_id)}}" class="btn btn-info">编辑</a>
                 <a href="{{url('/acc/destroy/'.$v->acc_id)}}" class="btn btn-danger">删除</a>
            </td>
		</tr>
        @endforeach
		<tr>
			<td colsoan='6'>{{$acc->appends($query)->links()}}</td>
		</tr>
    </touch>
</table>
</body>
</html>
<script>
//无刷新页面
$(document).on('click','.pagination a',function(){
    var url=$(this).attr('href');
    // alert(url);
    $.get(url,function(result){
        $('tbody').html(result);
    });
    return false;
});
//即点即改
$(document).on('click','.acc_man',function(){
    var name=$(this).text();
    $(this).parent().html("<input type='text' class='input_man' value="+name+">");
})
$(document).on("blur",".input_man",function(){
    // alert(12);
    var obj=$(this);
    var acc_man=$(this).val();
    // alert(acc_man);
    var id=$(this).parents('tr').attr('acc_id');
    // alert(id);
    $.get(
        "/acc/ajaxjd",
        {id:id,acc_man:acc_man},
        function(res){
            // alert(res);
            if(res.code==00){
                obj.parent().html("<span class='acc_man'>"+acc_man+"</span>");
            }
        },"json"
    )
})
</script>
@endsection