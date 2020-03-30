@foreach ($ctrInfo as $v)
			<tr sln_id = "{{$v->ctr_id}}">
				<th style="padding-left:20px;">{{$v->ctr_id}}</th>
				<th>
                    <span class="span_name">{{$v->ctr_name}}</span>
                </th>
				<th>{{$v->ctr_leven=="1" ? "会员" : "非会员"}}</th>
				<th>{{$v->ctr_ly}}</th>
				<th>{{$v->sln_name}}</th>
				<th>{{$v->sln_tels}}</th>
				<th>{{$v->sln_tel}}</th>
				<th>
                <a href="{{url('/ctr/edit/'.$v->ctr_id)}}" class="btn btn-info">编辑</a>
                <a href="javascript:void(0);" class="btn btn-danger del">删除</a>
                </th>
			</tr>
        @endforeach
		<tr><td colspan="6">{{$ctrInfo->links()}}</td></tr>