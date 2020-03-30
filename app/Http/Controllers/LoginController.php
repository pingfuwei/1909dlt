<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
class LoginController extends Controller
{
   //登陆展示
    public function login(){
        return view("login.login");
    }
    public function loginDo(){
//        echo 11;
        \request()->validate([
            "admin_name"=>"required",
            "admin_pwd"=>"required",
        ],[
            "admin_name.required"=>"账号不能为空",
            "admin_pwd.required"=>"密码不能为空",
        ]);

        $data=\request()->except("_token");
//        dd($data["admin_name"]);
        $res=Admin::where("admin_name",$data["admin_name"])->first();
        if($res){
            if(decrypt($res["admin_pwd"])==$data["admin_pwd"]){
//                dd($res);
                Cookie::queue("admin_user",$res["admin_name"]);
                Cookie::queue("admin_leven",$res["admin_leven"]);
//                dd($admin);die;
                return redirect("/admin");
            }
        }else{
            return redirect("/login/login")->with("msg","账号或密码错误");
        }
//        dd($res);
    }
    public function index(){
//        $admin=\request()->cookie("admin_user");
//        dd($admin);
        return view("login.index");
    }
    //退出
    public function quit(){
        if(\request()->session()->flush()===null){
            return redirect("login/login");
        }
    }
}
