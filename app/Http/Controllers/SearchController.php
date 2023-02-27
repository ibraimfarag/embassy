<?php

namespace App\Http\Controllers;

use App\Models\PageSection;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($keyword){
        $data['sections'] = PageSection::search($keyword, null, true, true)->get();
        return view('search',compact('data','keyword'));
    }

    public function searchPost(Request $request){
        $results = PageSection::search($request->input('keyword'), null, true, false)->get();
        $keyword = $request->input('keyword');
        $lang = $request->input('lang');
              
        $data = [];
        $data['sections'] = [];
        
        foreach ($results as $key=>$result){
            $data['sections'][$key] = $result;

            if($lang=='en')
                $data['sections'][$key]['url'] = url('en/'.$result->page->slug.'#'.$result->slug);
            elseif($lang=='ar')
                $data['sections'][$key]['url'] = url('ar/'.$result->page->slug.'#'.$result->slug);
            else
                $data['sections'][$key]['url'] = url($result->page->slug.'#'.$result->slug);
        }

        return view('search',compact('data','keyword','lang'));
    }
}
