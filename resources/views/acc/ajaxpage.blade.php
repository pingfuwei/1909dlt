@foreach ($acc as $v)
		<tr>
			<td>{{$v->acc_id}}</td>
			<td>{{$v->sln_name}}</td>
			<td>{{$v->ctr_name}}</td>
            <td>{{$v->acc_man}}</td>
            <td>@php echo date("Y-m-d H:i:s",$v->acc_time)@endphp</td>
            <td>{{$v->acc_addre}}</td>
            <td>{{$v->acc_times}}</td>
            <td>{{$v->acc_list}}</td>
			<td>
                 <a href="{{url('/acc/edit/'.$v->acc_id)}}" class="btn btn-info">编辑</a>
                 <a href="{{url('/acc/destroy/'.$v->acc_id)}}" class="btn btn-danger">删除</a></td>
		</tr>
        @endforeach
		<tr>
			<td colsoan='6'>{{$acc->links()}}</td>
		</tr>