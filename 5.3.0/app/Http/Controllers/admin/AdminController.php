<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //后台界面
    public function loginview()
    {
        return view('admin.login');
    }

    //后台登录
    public function dologin(Request $request)
    {
//        dd($request);
        //获取输入的账号密码
        $username = $request->get('username');
        $password = $request->get('password');
        //验证格式
        $rules = [
//            "cpt" => 'required|captcha',
            'username' => 'required',
            'password' => 'required'
        ];
//        dd($rules);
        $messages = [
            'username.required' => '用户名不能为空',
            'password.required' => '请输入密码'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

//        $error = $validator->errors();
//        echo $error->first('username');
        if ($validator->fails()) {
            return back()->withErrors($validator);
//
      }
//           验证登录信息
        $reslut = DB::table('adminusers')->where('username', $username)->where('password', $password)->get()->toArray();
//          dd($reslut);
       if($reslut==false){
           echo '用户名或密码错误';
       }else{
           return view('admin.Index');
       }
    }
}