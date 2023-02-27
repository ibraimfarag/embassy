<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryPhoto;
use App\Models\PageImageSlide;
use App\Services\CanCreateSlug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class HomeSlideController extends Controller
{

    use CanCreateSlug;

    public function __construct(PageImageSlide $model)
    {
        $this->model = $model;
    }

    public function index(){
        $pageSlug = 'home';
        $posts = $this->model->get();
        return view('admin.home-slides.index', compact('posts','pageSlug'));
    }

    public function edit($id){
        $pageSlug = 'home';

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        return view('admin.home-slides.edit', compact('post','pageSlug'));
    }

    public function delete($id){

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect('admin/content/home-slides/');
    }

    public function deleteSlide($id){

        $post = GalleryPhoto::find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect()->back();
    }

    public function update(Request $request){

        $id = $request->input('id');
        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $input = $request->except('_token','id','thumbnail');
        $file = $request->file('photo');

        $destinationPath = 'public/uploads/home-slides';

        if(isset($file)){
            $newFileName = Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(1120, 300)->save($destinationPath.'/'.$newFileName);
            $input['photo'] = 'uploads/home-slides/'. $newFileName;
        }
        
        $input['page_id'] = 1;
        $post->update($input);

        Session::flash('success','Item updated successfully');
        return redirect('admin/content/home-slides/edit/'.$post->id);
    }

    public function create(){
        $pageSlug = 'home';
        return view('admin.home-slides.create',compact('pageSlug'));
    }

    public function store(Request $request){
        $input = $request->except('_token','thumbnail');
        $file = $request->file('photo');

        $destinationPath = 'public/uploads/home-slides';

        $newFileName = Str::random(32).'.'.$file->getClientOriginalExtension();
        Image::make($file->getRealPath())->fit(1120, 300)->save($destinationPath.'/'.$newFileName);
        $input['photo'] = 'uploads/home-slides/'. $newFileName;
        $input['page_id'] = 1;
        
        $newgallery = $this->model->create($input);

        return redirect('admin/content/home-slides/edit/'.$newgallery->id);
    }
}
