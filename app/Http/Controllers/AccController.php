<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Acc;
use App\Ctr;
use App\Sln;
use App\Http\Requests\StoreAccPost;
class AccController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示的页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //搜索
        $page=request()->page??1;
        $acc_man=request()->acc_man;
       
        $where=[];
            if($acc_man){
                $where[]=['acc_man','like',"%$acc_man%"];
            }
         //分页 
         $paginate=config('app.pageSize');
        $acc=Acc::select('acc.*','sln.sln_name','ctr.ctr_name')
            ->leftjoin('sln','sln.sln_id','=','acc.acc_id')
            ->leftjoin('ctr','ctr.ctr_id','=','acc.ctr_id')
            ->where($where)
            ->paginate($paginate);
        //无刷新分页
        if(request()->ajax()){
            return view('acc.ajaxpage',['acc'=>$acc]);
          }
        $query=request()->all();
        return view('acc.index',['acc'=>$acc,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加展示页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //查询客户
        $ctr=Ctr::all();
        //查询业务员
        $sln=Sln::all();
        
        return view('acc.create',['ctr'=>$ctr,'sln'=>$sln]);
    }

    /**
     * Store a newly created resource in storage.
     *添加执行页面
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccPost $request)
    {
        $acc=request()->except('_token');
        $acc['acc_time']=time();
        $res=Acc::insert($acc);
        if($res){
            return redirect('/acc/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *修改展示页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查询客户
        $ctr=Ctr::all();
        //查询业务员
        $sln=Sln::all();
        $acc=Acc::where('acc_id',$id)->first();
        return view('acc.edit',['ctr'=>$ctr,'sln'=>$sln,'acc'=>$acc]);
    }

    /**
     * Update the specified resource in storage.
     *修改执行页面
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAccPost $request, $id)
    {
        $acc=$request->except('_token');
        // dd($acc);
        $res=Acc::where('acc_id',$id)->update($acc);
        if($res!==false){
            return redirect('/acc/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除的方法
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Acc::destroy($id);
        if($res){
            return redirect('/acc/index');
        }
    }
    //及点击该
    public function ajaxjd(){
        $id=request()->get('id');
        $acc_man=request()->get('acc_man');
        $res=Acc::where('acc_id',$id)->update(['acc_man'=>$acc_man]);
        if($res){
            return json_encode(['code'=>'00','msg'=>'ok']);
        }
    }
}
