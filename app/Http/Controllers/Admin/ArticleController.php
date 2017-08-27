<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    //get.admin/article  All article list
    public function index()
    {
        $data = Article::orderBy('art_id','desc')->paginate(15);
        return view('admin.article.index',compact('data'));
    }

    //get.admin/article/create  Add article
    public function create()
    {
        $data = (new Category)->tree();
        return view('admin.article.add',compact('data'));
    }

    //post.admin/article  Add article submit
    public function store()
    {
        $input = Input::except('_token');
        $input["art_time"] = time();

        $rules = [
            'art_title'=>'required',
            'art_content'=>'required'
        ];

        $message = [
            'art_title.required'=>'Article name can not be empty!',
            'art_content.required'=>'Article content can not be empty!'
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Article::create($input);
            if($re){
                return redirect('admin/article');
            }else{
                return back()->with('errors','category update fail, please try again later!');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/article/{article}/edit  Edit article
    public function edit($art_id)
    {
        $data = (new Category)->tree();
        $field = Article::find($art_id);
        return view('admin.article.edit',compact('data','field'));
    }

    //put.admin/article/{article}  Update article
    public function update($art_id)
    {
        $input = Input::except('_token','_method');
        $re = Article::where('art_id',$art_id)->update($input);
        //dd($re);
//        if($re){
            return redirect('admin/article');
//        }else{
//            return back()->with('errors','Article update fail, please try again later!');
//        }
    }
    //get.admin/article/{article}  Show single article info
    public function show()
    {

    }

    //delete.admin/article/{article}  Delete single article
    public function destroy($art_id)
    {
        $re = Article::where('art_id',$art_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => 'Article delete successfully!'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => 'Article delete fail, please try again later!'
            ];
        }
        return $data;
    }
}
