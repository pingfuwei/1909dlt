<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sln;
use App\Http\Requests\StoreSlnPost;

class SlnController extends Controller
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
            $where[] = ["sln_name","like","%$sln_name%"];
        }
        $slnInfo = Sln::where($where)->paginate(2);
        // dd($slnInfo);

         //ajax页面刷新分页
        //判断是否接收到ajax
        if(request()->ajax()){
            //接收到Ajax 返回视图新页面
            return view("sln.ajaxpage",["slnInfo"=>$slnInfo]);
        }

        return view("sln.index",["slnInfo"=>$slnInfo,"name"=>$name]);
    }

    //即点即改
    public function ajaxunp(){
        $id = request()->get("id");
        $new_name = request()->get("new_name");
        // dd($id);
        $res = Sln::where("sln_id",$id)->update(["sln_name"=>$new_name]);
        if($res){
            return json_encode(["code"=>"00000","msg"=>"ok"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *添加展示
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("sln/create");
    }

    //ajax验证唯一性
    public function ajaxName(){
        $sname = request()->get("sname");
        $res = Sln::where("sln_name",$sname)->count();
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
    public function store(StoreSlnPost $request)
    {
        $arr = $request->except("_token");
        // dd($arr);
        $res = Sln::create($arr);
        if($res){
            return redirect("/sln/index");
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
        $slnInfo = Sln::where("sln_id",$id)->first();
        // dd($slnInfo);
        return view("sln.edit",["slnInfo"=>$slnInfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(StoreSlnPost $request,$id)
    {
        $arr = $request->except("_token");
        // dd($arr);
        $res = Sln::where("sln_id",$id)->update($arr);
        // dd($res);
        if($res!==false){
            return redirect("/sln/index");
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
        $res = Sln::where("sln_id",$id)->delete();
        if($res){
            if(request()->ajax()){
                return json_encode(["code"=>"00000","msg"=>"删除成功"]);
            }else{
                return redirect("/sln/index");
            }
        }
    }
}
