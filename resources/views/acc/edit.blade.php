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

<form class="form-horizontal" role="form" action="{{url('/acc/update/'.$acc->acc_id)}}" method="post">
@csrf

	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">业务员名称</label>
		<div class="col-sm-7">
			<select name="sln_id" id="sln_id">
                <option value="">--请选择--</option>
            @foreach($sln as $v)
                <option {{$acc->sln_id==$v->sln_id?'selected':''}} value="{{$v->sln_id}}">{{$v->sln_name}}</option>
            @endforeach
            </select>
			<b style="color:red">{{$errors->first('sln_id')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">客户名称</label>
		<div class="col-sm-7">
            <select name="ctr_id" id="ctr_id">
                <option value="">--请选择--</option>
                @foreach($ctr as $v)
                <option {{$acc->ctr_id==$v->ctr_id?'selected':''}} value="{{$v->ctr_id}}">{{$v->ctr_name}}</option>
                @endforeach
            </select>
			<b style="color:red">{{$errors->first('ctr_id')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">访问人</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="acc_man"  name="acc_man"
            placeholder="请输入访问人" value="{{$acc->acc_man}}">
            <b style="color:red">{{$errors->first('acc_man')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">访问地址</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="acc_addre"  name="acc_addre"
				   placeholder="请输入访问地址" value="{{$acc->acc_addre}}">
            <b style="color:red">{{$errors->first('acc_addre')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">下次访问时间</label>
		<div class="col-sm-7">
			<input type="text" class="form-control" id="acc_times"  name="acc_times"
				   placeholder="请输入下次访问时间" value="{{$acc->acc_times}}">
            <b style="color:red">{{$errors->first('acc_times')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">访问详情</label>
		<div class="col-sm-7">
			<textarea type="text" class="form-control" id="acc_list"  name="acc_list"
				   placeholder="请输入访问详情">{{$acc->acc_list}}</textarea>
            <b style="color:red">{{$errors->first('acc_list')}}</b>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>
</body>
</html>

<script>
$(document).on('change',"#sln_id",function(){
    $(this).next().empty();
    var sln=$(this).val();
    if(sln==''){
        $(this).next('b').text("业务员名称不能为空");
    }
})
$(document).on('change',"#ctr_id",function(){
    $(this).next().empty();
    var ctr=$(this).val();
    if(ctr==''){
        $(this).next('b').text("顾客名称不能为空");
    }
})
$(document).on('blur',"#acc_man",function(){
    $(this).next().empty();
    var sman=$(this).val();
    var man=/^[\u4e00-\u9fa5]{2,6}$/
    if(sman==''){
        $(this).next('b').text("访问人名称不能为空");
    }else if(!man.test(sman)){
        $(this).next('b').text("访问人名称必须中文且2-6位");
    }
})

$(document).on('blur',"#acc_addre",function(){
    $(this).next().empty();
    var saddre=$(this).val();
    var addre=/^[\u4e00-\u9fa5,a-zA-Z0-9]{5,100}$/
    if(saddre==''){
        $(this).next('b').text("访问人名称地址不能为空");
    }else if(!addre.test(saddre)){
        $(this).next('b').text("访问人名称地址在2到100位之间");
    }
})

$(document).on('blur',"#acc_times",function(){
    $(this).next().empty();
    var times=$(this).val();
    if(times==''){
        $(this).next('b').text("下次访问时间不能为空");
    }
})

$(document).on('blur',"#acc_list",function(){
    $(this).next().empty();
    var list=$(this).val();
    if(list==''){
        $(this).next('b').text("访问详情不能为空");
    }
})

</script>



@endsection