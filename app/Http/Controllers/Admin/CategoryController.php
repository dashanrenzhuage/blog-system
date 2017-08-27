<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{
    //get.admin/category  All category list
    public function index()
    {
//        $categorys = Category::tree();
        $categorys = (new Category)->tree();
        return view('admin.category.index')->with('data',$categorys);
    }

    public function changeOrder()
    {
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();
        if($re){
            $data = [
                'status' => 0,
                'msg'=>"Category order update sussessfully!"
            ];
        }else{
            $data = [
                'status' => 1,
                'msg'=>"Category order update fail, please try again later!"
            ];
        }
        return $data;
    }

    //get.admin/category/create  Add category
    public function create()
    {
        $data = Category::where('cate_pid',0)->get();
        return view('admin/category/add',compact('data'));
    }

    //post.admin/category  Add category submit
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'cate_name'=>'required'
        ];
        $message = [
            'cate_name.required'=>'Category name can not be empty!'
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re = Category::create($input);
            if($re){
                return redirect('admin/category');
            }else{
                return back()->with('errors','category update fail, please try again later!');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/category/{category}/edit  Edit category
    public function edit($cate_id)
    {
        $field = Category::find($cate_id);
        $data = Category::where('cate_pid',0)->get();
        return view('admin.category.edit',compact('field','data'));
    }

    //put.admin/category/{category}  Update category
    public function update($cate_id)
    {
        $input = Input::except('_token','_method');
        $re = Category::where('cate_id',$cate_id)->update($input);
//        if($re){
            return redirect('admin/category');
//        }else{
//            return back()->with('errors','Category information update fail, please try again later!');
//        }
    }

    //get.admin/category/{category}  Show single category info
    public function show()
    {

    }

    //delete.admin/category/{category}  Delete single category
    public function destroy($cate_id)
    {
       $re = Category::where('cate_id',$cate_id)->delete();
       Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
       if($re){
            $data = [
                'status' => 0,
                'msg' => 'Category delete successfully!'
            ];
       }else{
           $data = [
               'status' => 1,
               'msg' => 'Category delete fail, please try again later!'
           ];
       }
       return $data;
    }
}
