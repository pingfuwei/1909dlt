@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="{{url('admin/create')}}">管理员添加</a></li>
                    <li><a href="{{url('admin/index')}}">商品列表</a></li>
                    {{--<li><a href="{{url('goods/edit')}}">商品修改</a></li>--}}
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">

                <center>
                    <h2>管理员添加<button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('admin/index')}}">列表展示页面</a></button></h2>
                    <form action="{{url('admin/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">名字</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="a" name="admin_name"
                                       placeholder="请输入"><span id="span_a"></span>
                                <b style="color: red">{{$errors->first("admin_name")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="b" name="admin_pwd"
                                       placeholder="请输入"><span id="span_b"></span>
                                <b style="color: red">{{$errors->first("admin_pwd")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">手机号</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="c" name="admin_tel"
                                       placeholder="请输入"><span id="span_c"></span>
                                <b style="color: red">{{$errors->first("admin_tel")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">邮箱</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="d" name="admin_email"
                                       placeholder="请输入"><span id="span_d"></span>
                                <b style="color: red">{{$errors->first("admin_email")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">等级</label>
                            <div class="col-sm-1">
                                <select name="admin_leven" id="">
                                    <option value="">--请选择--</option>
                                    <option value="0">产品经理</option>
                                    <option value="1">业务员</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-7">
                                <button type="submit" id="f" class="form-control btn-primary">添加</button>
                            </div>
                        </div>
                    </form>
                </center>
                <script>
                    $(function () {
                        $(document).on("blur","#a",function () {
                            var name=$("#a").val();
//                            alert(name)
                            if(name==""){
                                $("#span_a").html("<font color='red'>不能为空<//font>")
                            }else{
                                $.ajax({
                                    url:"{{url('admin/aja')}}",
                                    type:"get",
                                    data:{name:name},
                                    success:function (res) {
                                        if(res=="ok"){
                                            $("#span_a").html("<font color='green'>√<//font>")
                                        }else{
                                            $("#span_a").html("<font color='red'>已存在<//font>")
                                        }
                                    }
                                })
                            }
                        })
                        $(document).on("blur","#b",function () {
                            var name=$("#b").val();
//                            alert(name)
                            if(name==""){
                                $("#span_b").html("<font color='red'>不能为空</font>")
                            }else{
                                $("#span_b").empty();
                            }
                        })
                        $(document).on("blur","#c",function () {
                            var name=$("#c").val();
//                            alert(name)
                            if(name==""){
                                $("#span_c").html("<font color='red'>不能为空</font>")
                            }else{
                                $("#span_c").empty();
                            }
                        })
                        $(document).on("blur","#d",function () {
                            var name=$("#d").val();
//                            alert(name)
                            if(name==""){
                                $("#span_d").html("<font color='red'>不能为空</font>")
                            }else{
                                $("#span_d").empty();
                            }
                        })
                        $(document).on("click","#f",function () {
                            if($("#a").val()==""){
                                $("#span_a").html("<font color='red'>不能为空</font>")
                                flag=false
                            }
                            if($("#b").val()==""){
                                $("#span_b").html("<font color='red'>不能为空</font>")
                                flag=false

                            }
                            if($("#c").val()==""){
                                $("#span_c").html("<font color='red'>不能为空</font>")
                                flag=false

                            }
                            if($("#d").val()==""){
                                $("#span_d").html("<font color='red'>不能为空</font>")
                                flag=false

                            }
                            if(flag==false){
                                return flag
                            }
                        })
                    })
                </script>
@endsection