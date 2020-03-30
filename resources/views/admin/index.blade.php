<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 条纹表格</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav nav-pills nav-stacked">
                    <li ><a href="{{url('admin/create')}}">管理员添加</a></li>
                    <li class="active"><a href="{{url('admin/index')}}">管理员列表</a></li>
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">
                <center>
                    <table class="table table-striped" style="text-align: center">
                        <h2>列表展示 <button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('admin/create')}}">添加页面</a></button></h2>
                        <thead>
                        <tr>
                            <th style="text-align: center">名称</th>
                            <th style="text-align: center">手机号</th>
                            <th style="text-align: center">邮箱</th>
                            <th style="text-align: center">等级</th>
                            <th style="text-align: center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admin as $v)
                            <tr>
                                <td>
                                    <span class="a">{{$v->admin_name}}</span>
                                    <input type="text" class="b" value="{{$v->admin_name}}" admin_id="{{$v->admin_id}}" admin_name="admin_name"  style="display: none">
                                </td>
                                <td>{{$v->admin_tel}}</td>
                                <td>{{$v->admin_email}}</td>
                                <td>{{$v->admin_leven==0 ? "产品经理" : "业务员"}}</td>
                                <td>
                                    <button type="button" brand_id="{{$v->admin_id}}" class="btn btn-primary btn-sm">编辑</button>
                                    <button type="button" brand_id="{{$v->admin_id}}"  class="btn btn-danger btn-sm">删除</button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                                    <td colspan="5">{{$admin->links()}}</td>
                        </tr>

                        </tbody>
                    </table>
                </center>
            </div>
        </div>
    </div>

@endsection


</body>
</html>
<script src="/jquery.js"></script>
<script>
        $(function () {
            //无限刷新
            $(document).on("click",".pagination a",function () {
                var url=$(this).attr("href");
//                alert(url);
                $.get(url,function (index) {
                    $(".table").html(index);
                })
                return false;
            })
            $(document).on("click",".btn-danger",function () {
                if(confirm("是否删除")){
                    var _this=$(this);
                    var id=_this.attr("brand_id");
                    location.href="{{url('admin/destroy')}}/"+id;
                }
            })
            $(document).on("click",".btn-primary",function () {
                if(confirm("是否编辑")){
                    var _this=$(this);
                    var id=_this.attr("brand_id");
                    location.href="{{url('admin/edit')}}/"+id;
                }
            })
            //名称的即点即改
            $(document).on("click",".a",function () {
                var _this=$(this);
                _this.hide();
                _this.next("input").show();
            })
            $(document).on("blur",".b",function () {
                var _this=$(this)
                var _val=_this.val();
                var admin_name=_this.attr("admin_name")
                var admin_id=_this.attr("admin_id")
                $.ajax({
                    url:"{{url('admin/admin_jd')}}",
                    type:"get",
                    data:{_val:_val,admin_name:admin_name,admin_id:admin_id},
                    success:function (res) {
                        if(res=="ok"){
                            _this.hide()
                            _this.prev("span").text(_val).show()
                        }
                    }
                })

            })
        })

</script>
{{--<a href="{{url('brand/destroy',['id'=>$v->brand_id])}}">删除</a>--}}