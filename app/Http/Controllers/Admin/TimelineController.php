<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use Intervention\Image\ImageManagerStatic as Image;

class TimelineController extends Controller
{

    public function __construct(Timeline $model)
    {
        $this->model = $model;
    }

    public function index(){
        $pageSlug = 'bilateral-relations';
        $posts = $this->model->get();
        return view('admin.timeline.index', compact('posts','pageSlug'));
    }

    public function edit($id){

        $pageSlug = 'bilateral-relations';
        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        return view('admin.timeline.edit', compact('post','pageSlug'));
    }

    public function delete($id){

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect('admin/content/timeline');
    }


    public function update(Request $request){

        $id = $request->input('id');
        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $input = $request->except('_token','id');
        $files = $request->file();

        foreach ($files as $key => $file){
            //Move Uploaded File
            $destinationPath = 'public/uploads/timeline';
            $newFileName = Str::random(32).'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$newFileName);

            $input[$key] = 'uploads/timeline/'. $newFileName;
        }

        $post->update($input);


        Session::flash('success','Item updated successfully');
        return redirect('admin/content/timeline/edit/'.$post->id);
    }

    public function create(){
        $pageSlug = 'bilateral-relations';
        return view('admin.timeline.create',compact('pageSlug'));
    }

    public function store(Request $request){

        $input = $request->except('_token');
        $files = $request->file();
        //Move Uploaded File
        $destinationPath = 'public/uploads/timeline';

        foreach ($files as $key => $file){
            
            $newFileName = Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(157, 157)->save($destinationPath.'/'.$newFileName);

            $input[$key] = 'uploads/timeline/'. $newFileName;
        }

        $post = $this->model->create($input);

        Session::flash('success','Item added successfully');
        return redirect('admin/content/timeline/');
    }

}
