<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionPhoto;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SectionController extends Controller
{
    public function __construct(SectionPhoto $model)
    {
        $this->model = $model;
    }

    public function edit($id){

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        return view('admin.sections.edit', compact('post'));
    }

    public function delete($id){

        $post = $this->model->find($id);

        if(!$post)
            return 'Post not found!';

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect('dms-cms/sections/');
    }

    public function deleteSlide($id){

        $post = Upload::find($id);

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

        $input = $request->except('_token','id');
        $slides = $request->file('slide');

        foreach ($slides as $slide){

            //Move Uploaded File
            $destinationPath = 'uploads/sections';

            $newFileName = Str::random(32).'.'.$slide->getClientOriginalExtension();

            $slide->move($destinationPath,$newFileName);

            $upload['path'] = $destinationPath;
            $upload['original_name'] = $slide->getClientOriginalName();
            $upload['file_name'] = $newFileName;
            $upload['mime_type'] = $slide->getClientOriginalExtension();
            $upload['template'] = 'slide';

            $post->uploads()->create($upload);
        }

        $post->update($input);

        Session::flash('success','Item updated successfully');
        return redirect('dms-cms/sections/edit/'.$post->id);
    }

}
