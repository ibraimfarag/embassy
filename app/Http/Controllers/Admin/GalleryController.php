<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryPhoto;
use App\Services\CanCreateSlug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class GalleryController extends Controller
{

    use CanCreateSlug;

    public function __construct(Gallery $model)
    {
        $this->model = $model;
    }

    public function index(){
        $pageSlug = 'media-and-info';
        $posts = $this->model->get();
        return view('admin.galleries.index', compact('posts','pageSlug'));
    }

    public function edit($id){
        $pageSlug = 'media-and-info';

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        return view('admin.galleries.edit', compact('post','pageSlug'));
    }

    public function delete($id){

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect('admin/content/galleries/');
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

        $input = $request->except('_token','id','photo_title_ar','photo_title'.'photo_title_en');
        $file = $request->file('thumbnail');
        $slideCaptions = $request->input('slide');
        $slides = $request->file('slide');
        $newSlides = $request->file('new_slides');

        $destinationPath = 'public/uploads/galleries';

        if(isset($file)){
            $newFileName = Str::random(32).'.'.$file->getClientOriginalExtension();
            Image::make($file->getRealPath())->fit(367, 263)->save($destinationPath.'/'.$newFileName);
            $input['thumbnail'] = 'uploads/galleries/'. $newFileName;
        }
        
        if($slides){
            $destinationPath = 'public/uploads/galleries';
            
            foreach ($slides as $id=>$slide){
                $photo = GalleryPhoto::find($id);
                
                if($photo){
                    $newFileName = Str::random(32).'.'.$slide['photo']->getClientOriginalExtension();
                    Image::make($slide['photo']->getRealPath())->fit(255, 183)->save($destinationPath.'/'.$newFileName);

                    $data['thumbnail'] = 'uploads/galleries/'. $newFileName;

                    $newFileName = Str::random(32).'.'.$slide['photo']->getClientOriginalExtension();
                    Image::make($slide['photo']->getRealPath())->save($destinationPath.'/'.$newFileName);
                    $data['photo'] = 'uploads/galleries/'. $newFileName;

                    $photo->update($data);
                }
            }
        }
        
        if($slideCaptions){
            
            foreach ($slideCaptions as $id=>$slide){    
                $photo = GalleryPhoto::find($id);
                
                if($photo){
                    $photo->update($slide);
                }
            }
        }

        $post->update($input);

        $newslides = $request->file('new_slides');
        $captions['de'] = $request->input('new_photo_title');
        $captions['en']  = $request->input('new_photo_title_en');
        $captions['ar'] = $request->input('new_photo_title_ar');
        
        $destinationPath = 'public/uploads/galleries';

        if($newslides){
            foreach ($newslides as $index=>$slide){

                $newFileName = Str::random(32).'.'.$slide->getClientOriginalExtension();
                Image::make($slide->getRealPath())->fit(255, 183)->save($destinationPath.'/'.$newFileName);

                $data['thumbnail'] = 'uploads/galleries/'. $newFileName;

                $newFileName = Str::random(32).'.'.$slide->getClientOriginalExtension();
                Image::make($slide->getRealPath())->save($destinationPath.'/'.$newFileName);
                $data['photo'] = 'uploads/galleries/'. $newFileName;
                $data['title'] = $captions['de'][$index];
                $data['title_en'] = $captions['en'][$index];
                $data['title_ar'] = $captions['ar'][$index];

                $post->photos()->create($data);
            }
        }
        
        Session::flash('success','Item updated successfully');
        return redirect('admin/content/galleries/edit/'.$post->id);
    }

    public function create(){
        $pageSlug = 'media-and-info';
        return view('admin.galleries.create',compact('pageSlug'));
    }

    public function store(Request $request){
        $input = $request->except('_token','slide','photo_title_ar','photo_title'.'photo_title_en');
        $file = $request->file('thumbnail');
        $slides = $request->file('slide');
        $captions['de'] = $request->input('photo_title');
        $captions['en']  = $request->input('photo_title_en');
        $captions['ar'] = $request->input('photo_title_ar');

        $destinationPath = 'public/uploads/galleries';

        $newFileName = Str::random(32).'.'.$file->getClientOriginalExtension();
        Image::make($file->getRealPath())->fit(367, 263)->save($destinationPath.'/'.$newFileName);
        $input['thumbnail'] = 'uploads/galleries/'. $newFileName;

        $newgallery = \App\Models\Gallery::create($input);

        foreach ($slides as $index=>$slide){
            $newFileName = Str::random(32).'.'.$slide->getClientOriginalExtension();
            Image::make($slide->getRealPath())->fit(255, 183)->save($destinationPath.'/'.$newFileName);
            
            $data['thumbnail'] = 'uploads/galleries/'. $newFileName;
            
            $newFileName = Str::random(32).'.'.$slide->getClientOriginalExtension();
            Image::make($slide->getRealPath())->save($destinationPath.'/'.$newFileName);
            $data['photo'] = 'uploads/galleries/'. $newFileName;
            $data['title'] = $captions['de'][$index];
            $data['title_en'] = $captions['en'][$index];
            $data['title_ar'] = $captions['ar'][$index];

            $newgallery->photos()->create($data);
        }

        return redirect('admin/content/galleries/edit/'.$newgallery->id);
    }
}
