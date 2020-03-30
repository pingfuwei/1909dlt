<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *管理员展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=Admin::paginate(2);
        if(\request()->ajax()){
            return view("admin.aj",["admin"=>$admin]);
        }
        return view("admin.index",["admin"=>$admin]);
    }
    //名称的即点即改
    public function admin_jd(){
        $val=\request()->_val;
        $admin_name=\request()->admin_name;
        $admin_id=\request()->admin_id;
        $res=Admin::where("admin_id",$admin_id)->update(["$admin_name"=>$val]);
        if($res!==false){
            echo "ok";
        }
    }
    /**
     * Show the form for creating a new resource.
     *管理员添加展示
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.create");
    }
    //ajax
    public function aja(){
        $name=\request()->name;
        $res=Admin::where("admin_name",$name)->first();
//        echo $res;
        if($res){
            echo "no";
        }else{
            echo "ok";
        }
    }
    /**
     * Store a newly created resource in storage.
     *管理员添加执行
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
                "admin_name"=>"required",
                "admin_pwd"=>"required",
                "admin_tel"=>"required|regex:/^1[3,5,8]\d{9}$/",
                "admin_email"=>"required|regex:/^\d{10}@qq\.com$/",
        ],[
                "admin_name.required"=>"管理员名称必填",
                "admin_pwd.required"=>"密码名称必填",
                "admin_tel.required"=>"手机名称必填",
                "admin_tel.regex"=>"手机不合法",
                "admin_email.regex"=>"邮箱不合法",
                "admin_email.required"=>"邮箱不能为空",
        ]);
        $data=$request->except("_token");
        $data["admin_pwd"]=encrypt($data["admin_pwd"]);
        $res=Admin::insert($data);
//        dd($res);
        if($res){
            return redirect("admin/index");
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
        $admin=Admin::where("admin_id",$id)->first();
//        dd($admin);
        return view("admin.edit",["admin"=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "admin_name"=>"required",
            "admin_pwd"=>"required",
            "admin_tel"=>"required|regex:/^1[3,5,8]\d{9}$/",
            "admin_email"=>"required|regex:/^\d{10}@qq\.com$/",
        ],[
            "admin_name.required"=>"管理员名称必填",
            "admin_pwd.required"=>"密码名称必填",
            "admin_tel.required"=>"手机名称必填",
            "admin_tel.regex"=>"手机不合法",
            "admin_email.regex"=>"邮箱不合法",
            "admin_email.required"=>"邮箱不能为空",
        ]);
        $data=$request->except("_token");
        $info=Admin::find($id);
//        dd($admininfo);
        if($data["admin_pwd"]==$info["admin_pwd"]){
            $data=$data;
        }else{
            $data["admin_pwd"]=encrypt($data["admin_pwd"]);
        }
//        $data["admin_pwd"]=decrypt($data["admin_pwd"]);
        $res=Admin::where("admin_id",$id)->update($data);
        if($res!=false){
            return redirect("admin/index");
        }
//        dd($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Admin::destroy($id);
        if($res){
            return redirect("admin/index");
        }
    }
}
