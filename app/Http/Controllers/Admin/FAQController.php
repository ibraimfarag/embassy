<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqItem;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\Services\CanCreateSlug;

class FAQController extends Controller
{
    use CanCreateSlug;

    public function __construct(Faq $model)
    {
        $this->model = $model;
    }

    public function index($id){
        $pageSlug = 'faqs';
        $posts = $this->model->with('items')->where('id',$id)->first();

        return view('admin.faqs.index', compact('posts','pageSlug'));
    }

    public function edit($id){

        $pageSlug = 'faqs';
        $post = FaqItem::find($id);

        if(!$post)
            return 'Post not found!';

        return view('admin.faqs.edit', compact('post','pageSlug'));
    }

    public function delete($id){

        $post = FaqItem::find($id);

        if(!$post)
            return 'Post not found!';

        $id = $post->faq_id;

        $post->delete();

        Session::flash('success','Item deleted successfully');

        return redirect('admin/faqs/'.$id);
    }


    public function update(Request $request){

        $id = $request->input('id');
        $post = FaqItem::find($id);
        $input = $request->except('id','_token');

        if(!$post)
            return 'Post not found!';

        $post->update($input);

        Session::flash('success','Item updated successfully');
        return redirect('admin/faqs/edit/'.$post->id);
    }

    public function create($id){
        $pageSlug = 'media-and-info';
        return view('admin.faqs.create',compact('pageSlug','id'));
    }

    public function store(Request $request){

        $input = $request->except('_token','id');
        $target = Faq::find($request->input('id'));

        if($target)
            $target->items()->create($input);

        Session::flash('success','Item added successfully');
        return redirect('admin/faqs/'.$target->id);
    }

}
