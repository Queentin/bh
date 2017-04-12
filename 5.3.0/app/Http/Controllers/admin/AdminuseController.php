<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class AdminuseController extends Controller
{
    //用户列表
    public function useadd()
    {
        $users = DB::table('adminusers')->get()->toArray();
//            ->leftJoin('role_user', 'role_user.user_id','users.id')
//            ->leftJoin('roles', 'roles.id', 'role_user.role_id')
//            ->groupBy('users.id')->get();
//        dd($users);
        return view('admin.design')->with('users',$users);
    }

    //增加用户
    public function inuseview()
    {
        return view('admin.insert');
    }

    public function insert(Request $request)
    {
        //接受表单信息
        $rose = $request->get('rose');
        $username = $request->get('username');
        $password = $request->get('password');
        $repassword = $request->get('repassword');
        $phone = $request->get('phone');
        //增加用户
        if ($password == $repassword)
        {
            DB::table('adminusers')->insert([
                'username'=>$username,
                'password'=>$password,
                'phone'=>$phone
            ]);
        }

    }

}
