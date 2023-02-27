<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\Services\CanCreateSlug;

class PressReleaseController extends Controller
{
    use CanCreateSlug;
    
    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function index(){
        $pageSlug = 'media-and-info';

        $posts = $this->model->where('article_type_id',1)->get();
        return view('admin.press-releases.index', compact('posts','pageSlug'));
    }

    public function edit($id){
        $pageSlug = 'media-and-info';

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        return view('admin.press-releases.edit', compact('post','pageSlug'));
    }

    public function delete($id){

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect('admin/content/press-releases');
    }


    public function update(Request $request){

        $id = $request->input('id');
        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $input = $request->except('_token','id','featured_image');
        $files = $request->file();

       if(isset($files['featured_image'])){
           $file = $files['featured_image'];
                //Move Uploaded File
            $destinationPath = 'public/uploads/press-releases';

            $newFileName = Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(800, 400)->save($destinationPath.'/'.$newFileName);
            $input['featured_image'] = 'uploads/press-releases/'. $newFileName;

            // to finally create image instances
            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(340, 220)->save($destinationPath.'/'.$thumbnailName);
            $input['thumbnail'] = 'uploads/press-releases/'. $thumbnailName; 
       }
        
        if($input['title_en'] != $post->title_en)
            $input['slug'] = $this->generateSlug($input['title_en']);

        $input['publish_date'] = Carbon::parse($input['publish_date'])->format('Y-m-d');

        $post->update($input);

        Session::flash('success','Item updated successfully');
        return redirect()->back();
    }

    public function create(){
        $pageSlug = 'media-and-info';
        return view('admin.press-releases.create',compact('pageSlug'));
    }

    public function store(Request $request){
        
        $input = $request->except('_token','featured_image');
        $files = $request->file();

       if(isset($files['featured_image'])){
           $file = $files['featured_image'];
                //Move Uploaded File
            $destinationPath = 'public/uploads/press-releases';

            $newFileName = Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(800, 400)->save($destinationPath.'/'.$newFileName);
            $input['featured_image'] = 'uploads/press-releases/'. $newFileName;

            // to finally create image instances
            $thumbnailName =  Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(340, 220)->save($destinationPath.'/'.$thumbnailName);
            $input['thumbnail'] = 'uploads/press-releases/'. $thumbnailName; 
       }

        $input['publish_date'] = Carbon::parse($input['publish_date'])->format('Y-m-d');
        $input['article_type_id'] = 1;
        $input['slug'] = $this->generateSlug($input['title_en']);
        $post = $this->model->create($input);

        Session::flash('success','Item added successfully');
        return redirect('admin/content/press-releases/');
    }

}
