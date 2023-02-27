<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Services\CanCreateSlug;

class NewsletterMediaController extends Controller
{
    use CanCreateSlug;

    public function __construct(Newsletter $model)
    {
        $this->model = $model;
    }

    public function index(){
        $pageSlug = 'media-and-info';
        $posts = $this->model->get();
        return view('admin.newsletters-media.index', compact('posts','pageSlug'));
    }

    public function edit($id){
        $pageSlug = 'media-and-info';

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        return view('admin.newsletters-media.edit', compact('post','pageSlug'));
    }

    public function delete($id){

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect('admin/content/newsletters-media');
    }


    public function update(Request $request){

        $id = $request->input('id');
        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $input = $request->except('_token','file');
        $files = $request->file();

        if(isset($files['file'])){
            $file = $files['file'];

            $destinationPath = 'public/uploads/newsletters-media';
            $filename = $input['title'].' -  '.$input['edition']. ' - '.$input['date'].'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$filename);

            $input['file'] = $destinationPath .'/'. $filename;
        }

        $input['title_en'] = $input['title'];
        $input['title_ar'] = $input['title'];
        $input['edition_en'] = $input['edition'];
        $input['edition_ar'] = $input['edition'];

        $post->update($input);

        Session::flash('success','Item updated successfully');
        return redirect('admin/content/newsletters-media/edit/'.$post->id);
    }

    public function create(){
        $pageSlug = 'media-and-info';
        return view('admin.newsletters-media.create',compact('pageSlug'));
    }

    public function store(Request $request){

        $input = $request->except('_token','file');
        $files = $request->file();

        if(isset($files['file'])){
            $file = $files['file'];

            $destinationPath = 'public/uploads/newsletters-media';
            $filename = $input['title'].' -  '.$input['edition']. ' - '.$input['date'].'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$filename);

            $input['file'] = $destinationPath .'/'. $filename;
        }

        $input['title_en'] = $input['title'];
        $input['title_ar'] = $input['title'];
        $input['edition_en'] = $input['edition'];
        $input['edition_ar'] = $input['edition'];

        $post = $this->model->create($input);

        Session::flash('success','Item added successfully');
        return redirect('admin/content/newsletters-media/');
    }

}
