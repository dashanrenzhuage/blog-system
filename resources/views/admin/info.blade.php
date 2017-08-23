@extends('layouts.admin')
@section('content')
	<!--面包屑导航 开始-->
	<div class="crumb_warp">
		<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
		<i class="fa fa-home"></i> <a href="{{url('admin/info')}}">Home Page</a> &raquo; System Basic Information
	</div>
	<!--面包屑导航 结束-->
	
	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>Quick Actions</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>Add Articles</a>
                <a href="#"><i class="fa fa-recycle"></i>Batch Delete</a>
                <a href="#"><i class="fa fa-refresh"></i>Update Sort</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

	
    <div class="result_wrap">
        <div class="result_title">
            <h3>System Basic Information</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>Operating System</label><span>{{PHP_OS}}</span>
                </li>
                <li>
                    <label>Runtime Environment</label><span>{{$_SERVER['SERVER_SOFTWARE']}}}</span>
                </li>
                <li>
                    <label>PHP Run Mode</label><span>apache2handler</span>
                </li>
                <li>
                    <label>Static Design - Version</label><span>v-1.0</span>
                </li>
                <li>
                    <label>Upload Attachment Limit</label><span><?php echo get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"Not allowed to upload attachment";?></span>
                </li>
                <li>
                    <label>New York Time</label><span><?php echo date('m/d/Y H:i:s');?></span>
                </li>
                <li>
                    <label>Server Domain / IP</label><span>{{$_SERVER['SERVER_NAME']}}/{{$_SERVER['SERVER_ADDR']}}</span>
                </li>
                <li>
                    <label>Host</label><span>{{$_SERVER['SERVER_ADDR']}}</span>
                </li>
            </ul>
        </div>
    </div>


    <div class="result_wrap">
        <div class="result_title">
            <h3>Contact Me</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>LinkedIn：</label><span><a href="https://www.linkedin.com/in/congma0419" target="_blank">https://www.linkedin.com/in/congma0419</a></span>
                </li>
                <li>
                    <label>Github：</label><span><a href="https://github.com/dashanrenzhuage" target="_blank">https://github.com/dashanrenzhuage</a></span>
                </li>
            </ul>
        </div>
    </div>
	<!--结果集列表组件 结束-->
@endsection