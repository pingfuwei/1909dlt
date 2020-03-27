@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="{{url('goods/create')}}">商品添加</a></li>
                    <li><a href="{{url('goods/index')}}">商品列表</a></li>
                    {{--<li><a href="{{url('goods/edit')}}">商品修改</a></li>--}}
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">

            你好
@endsection