@extends('layouts.admin')
@section('content')
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">System Admin</div>
			<ul>
				<li><a href="#" class="active">Home Page</a></li>
				<li><a href="#">Admin Page</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>Administrator：admin</li>
				<li><a href="{{url('admin/pass')}}" target="main">Change Password</a></li>
				<li><a href="{{url('admin/quit')}}">Log Out</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>Operations</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/category/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>Add Category</a></li>
                    <li><a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>Category List</a></li>
					<li><a href="{{url('admin/article/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>Add Article</a></li>
					<li><a href="{{url('admin/article')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>Article List</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>System Settings</h3>
                <ul class="sub_menu">
                    <li><a href="#" target="main"><i class="fa fa-fw fa-cubes"></i>Configuration</a></li>
                    <li><a href="#" target="main"><i class="fa fa-fw fa-database"></i>Restore</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-thumb-tack"></i>Tool Navigation</h3>
                <ul class="sub_menu">
                    <li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>Icon Call</a></li>
                    <li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery Manual</a></li>
                    <li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>Color Board</a></li>
                    <li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>Components</a></li>
                </ul>
            </li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2017. Powered By Cong Ma.
	</div>
	<!--底部 结束-->
@endsection