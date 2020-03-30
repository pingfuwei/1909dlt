<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sln;
use App\Ctr;
use App\Http\Requests\StoreCtrPost;

class CtrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = request()->get("name");
        $where = [];
        if($name){
            $where[] = ["ctr_name","like","%$name%"];
        }
        $ctrInfo = Ctr::join("sln","ctr.sln_id","=","sln.sln_id")->where($where)->paginate(2);
        // dd($ctrInfo);
        if(request()->ajax()){
            //接收到Ajax 返回视图新页面
            return view("ctr.ajaxpage",["slnInfo"=>$slnInfo]);
        }


        return view("ctr.index",["ctrInfo"=>$ctrInfo,"name"=>$name]);
    }

     //即点即改
     public function ajaxunp(){
        $id = request()->get("id");
        $new_name = request()->get("new_name");
        // dd($id);
        $res = Ctr::where("ctr_id",$id)->update(["ctr_name"=>$new_name]);
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slnInfo = Sln::get();
        return view("ctr.create",["slnInfo"=>$slnInfo]);
    }

     //ajax验证唯一性
     public function ajaxName(){
        $sname = request()->get("sname");
        $res = Ctr::where("ctr_name",$sname)->count();
        if($res>0){
            echo "no";
        }else{
            echo "ok";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(StoreCtrPost $request)
    {
        // echo "123";die;
        $arr = $request->except("_token");
        $res = Ctr::create($arr);
        if($res){
            return redirect("/ctr/index");
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ctrInfo = Ctr::where("ctr_id",$id)->first();
        $slnInfo = Sln::get();
        // dd($ctrInfo);
        return view("ctr.edit",["ctrInfo"=>$ctrInfo,"slnInfo"=>$slnInfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(StoreCtrPost $request, $id)
    {
        // dd(123);
        $arr = $request->except("_token");
        // dd($arr);
        $res = Ctr::where("ctr_id",$id)->update($arr);
        // dd($res);
        if($res!==false){
            return redirect("/ctr/index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Ctr::where("ctr_id",$id)->delete();
        if($res){
            if(request()->ajax()){
                return json_encode(["code"=>"00000","msg"=>"删除成功"]);
            }else{
                return redirect("/ctr/index");
            }
        }
    }
}
