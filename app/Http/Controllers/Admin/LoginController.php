<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'resources/org/code/Code.class.php';
class LoginController extends CommonController
{
    public function login(){
        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code']) != $_code){
                return back()->with('msg','Verification code error!');
            }
            $user = User::first();
            if($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass) != $input['user_pass']){
                return back()->with('msg','Username or password error!');
            }
            session(['user'=>$user]);
            //dd(session('user'));
            return redirect('admin/index');
        }else{
            session(['user'=>null]);
            return view('admin.login');
        }
    }

    public function quit(){
        session(['user'=>null]);
        return redirect('admin/login');
    }

    public function code(){
        $code = new \Code;
        $code->make();
    }

}
