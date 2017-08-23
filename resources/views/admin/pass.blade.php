@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">Home Page</a> &raquo; Change Password
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>Change Password</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form method="post" action="">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th width="170"><i class="require">*</i>Old Password：</th>
                    <td>
                        <input type="password" name="password_o"> </i>Please enter old passowrd</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>New Password：</th>
                    <td>
                        <input type="password" name="password"> </i>New Password 6-20 digits</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>Confirm Password：</th>
                    <td>
                        <input type="password" name="password_confirmation"> </i>Re-enter Password</span>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="Submit">
                        <input type="button" class="back" onclick="history.go(-1)" value="Back">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection