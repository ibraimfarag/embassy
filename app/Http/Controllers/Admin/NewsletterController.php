<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewsletterEntry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class NewsletterController extends Controller
{
    public function __construct(NewsletterEntry $model)
    {
        $this->model = $model;
    }

    public function index(){
        $pageSlug = 'newsletters';
        $posts = $this->model->get();
        return view('admin.newsletters.index', compact('posts','pageSlug'));
    }

    public function show($id){
        $pageSlug = 'newsletters';
        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        return view('admin.newsletters.edit', compact('post','pageSlug'));
    }

    public function delete($id){

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect('admin/newsletters');
    }


    public function update(Request $request){

        $id = $request->input('id');
        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $input = $request->except('_token','icon');
        $file = $request->file('icon');

        if(isset($file)){
            //Move Uploaded File
            $destinationPath = 'public/uploads/newsletters';

            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(50, 50)->save($destinationPath.'/'.$thumbnailName);
            $input['icon'] = 'public/uploads/newsletters/'. $thumbnailName;
        }

        $post->update($input);

        Session::flash('success','Item updated successfully');
        return redirect('admin/content/newsletters/edit/'.$post->id);
    }

    public function create(){
        $pageSlug = 'newsletters';
        return view('admin.newsletters.create',compact('pageSlug'));
    }

    public function store(Request $request){

        $input = $request->except('_token','icon');
        $file = $request->file('icon');

        if(isset($file)){
            //Move Uploaded File
            $destinationPath = 'public/uploads/newsletters';

            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(50, 50)->save($destinationPath.'/'.$thumbnailName);
            $input['icon'] = 'public/uploads/newsletters/'. $thumbnailName;
        }

        $post = $this->model->create($input);

        Session::flash('success','Item added successfully');
        return redirect('admin/newsletters/');
    }
}
