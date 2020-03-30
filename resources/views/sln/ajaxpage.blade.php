@foreach ($slnInfo as $v)
			<tr>
				<th style="padding-left:20px;">{{$v->sln_id}}</th>
				<th>{{$v->sln_name}}</th>
				<th>{{$v->sln_sex=="1" ? "男" : "女"}}</th>
				<th>{{$v->sln_tels}}</th>
				<th>{{$v->sln_tel}}</th>
				<th>
                <a href="{{url('/sln/edit/'.$v->sln_id)}}" class="btn btn-info">编辑</a>
                <a href="{{url('/sln/destroy/'.$v->sln_id)}}" class="btn btn-danger">删除</a>
                </th>
			</tr>
        @endforeach
		<tr><td colspan="6">{{$slnInfo->links()}}</td></tr>