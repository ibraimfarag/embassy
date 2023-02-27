<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AnnouncementController extends Controller
{
    
    public function __construct(Announcement $model)
    {
        $this->model = $model;
    }

    public function index(){
        $pageSlug = 'home';
        $posts = $this->model->get();
        return view('admin.announcements.index', compact('posts','pageSlug'));
    }

    public function edit($id){
        $pageSlug = 'home';

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        return view('admin.announcements.edit', compact('post','pageSlug'));
    }

    public function delete($id){

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect('admin/content/announcements');
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
            $destinationPath = 'public/uploads/announcements';

            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(50, 50)->save($destinationPath.'/'.$thumbnailName);
            $input['icon'] = 'public/uploads/announcements/'. $thumbnailName;
        }

        $post->update($input);

        Session::flash('success','Item updated successfully');
        return redirect('admin/content/announcements/edit/'.$post->id);
    }

    public function create(){
        $pageSlug = 'home';
        return view('admin.announcements.create',compact('pageSlug'));
    }

    public function store(Request $request){
        
        $input = $request->except('_token','icon');
        $file = $request->file('icon');

       if(isset($file)){
                //Move Uploaded File
            $destinationPath = 'public/uploads/announcements';

            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(50, 50)->save($destinationPath.'/'.$thumbnailName);
            $input['icon'] = 'public/uploads/announcements/'. $thumbnailName;
       }

        $post = $this->model->create($input);

        Session::flash('success','Item added successfully');
        return redirect('admin/content/announcements/');
    }

}
