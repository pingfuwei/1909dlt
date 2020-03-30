<table class="table table-striped" style="text-align: center">

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
            <td>{{$v->admin_name}}</td>
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