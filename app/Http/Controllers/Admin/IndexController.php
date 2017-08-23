<?php
namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class indexController extends CommonController{
    public function index(){
        return view('admin.index');
    }

    public function info(){
        return view('admin.info');
    }

    //update super admin password
    public function pass(){
        if($input = Input::all()){
            $rules = [
                'password'=>'required|between:6,20|confirmed',
            ];
            $message = [
                'password.required'=>'New password can not be empty!',
                'password.between'=>'New password must be between 6 and 20 characters!',
                'password.confirmed'=>'The password confirmation does not match!'
            ];
            $validator = Validator::make($input,$rules,$message);
            if($validator->passes()){
                $user = User::first();
                $_password = Crypt::decrypt($user->user_pass);
                if($input['password_o'] == $_password){
                    if($input['password'] == $_password){
                        return back()->with('errors','The new password cannot be same as the oringinal password!');
                    }else{
                        $user->user_pass = Crypt::encrypt($input['password']);
                        $user->update();
                        return back()->with('errors','New password update successfully!');
                    }
                }else{
                    return back()->with('errors','The original password is not correct!');
                }
            }else{
                return back()->withErrors($validator);
            }
        }else {
            return view('admin.pass');
        }
    }

}