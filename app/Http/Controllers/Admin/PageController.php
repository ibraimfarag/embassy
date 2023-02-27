<?php

namespace App\Http\Controllers\Admin;

use App\Models\Change;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\PageSection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {
        $this->language = 'en';
    }

    public function home(){
        $pageSlug = 'home';

        return view('admin.page', compact('pageSlug'));
    }

    public function page($slug){
        $pageSlug = $slug;

        if($pageSlug=='settings')
            return view('admin.settings',compact('pageSlug'));

        return view('admin.page',compact('pageSlug'));
    }

    public function section($page,$section){
        $pageSlug = $page;
        $sectionId = $section;

        return view('admin.section',compact('pageSlug','sectionId'));
    }

    public function update(Request $request){
        $page = $request->input('page');
        $pageData = $request->input('pageData');

        $currentPage = Page::where('slug',$page)->first();

        $change_id = Str::random('32');
        foreach ($pageData as $key => $item){
            $content = PageSection::where('page_id',$currentPage->id)->where('slug',$key)->first();

            if($content){
                $content->content = $item['content'];

                if(isset($item['content_ar']))
                    $content->content_ar = $item['content_ar'];
                
                if(isset($item['content_en']))
                    $content->content_en = $item['content_en'];
                
                $content->content = $item['content'];

            }

            $content->save();
        }

        $files = $request->file('pageData');

        if($files){
            foreach ($files as $key => $file){

                //Move Uploaded File
                $destinationPath = 'public/uploads/pages/'.$page;
                $newFileName = Str::random(32).'.'.$file['content']->getClientOriginalExtension();

                $file['content']->move($destinationPath,$newFileName);

                $imgUrl = $destinationPath .'/'. $newFileName;
                $data = PageSection::where('page_id',$currentPage->id)->where('slug',$key)->first();

                if($data){
                    $data->content = $imgUrl;
                    $data->content_ar = $imgUrl;
                    $data->content_en = $imgUrl;
                    $data->save();
                }

            }
        }

        return redirect()->back();
    }

}
