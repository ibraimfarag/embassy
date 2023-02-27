<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Services\CanCreateSlug;

class EconomicBulletinController extends Controller
{
    use CanCreateSlug;
    
    public function __construct(Bulletin $model)
    {
        $this->model = $model;
    }

    public function index(){
        $pageSlug = 'media-and-info';
        $posts = $this->model->get();
        return view('admin.economic-bulletins.index', compact('posts','pageSlug'));
    }

    public function edit($id){
        $pageSlug = 'media-and-info';

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        return view('admin.economic-bulletins.edit', compact('post','pageSlug'));
    }

    public function delete($id){

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect('admin/content/economic-bulletins');
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
           
            $destinationPath = 'public/uploads/economic-bulletins';
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
        return redirect('admin/content/economic-bulletins/edit/'.$post->id);
    }

    public function create(){
        $pageSlug = 'media-and-info';
        return view('admin.economic-bulletins.create',compact('pageSlug'));
    }

    public function store(Request $request){
        
        $input = $request->except('_token','file');
        $files = $request->file();

       if(isset($files['file'])){
           $file = $files['file'];
           
            $destinationPath = 'public/uploads/economic-bulletins';
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
        return redirect('admin/content/economic-bulletins/');
    }

}
