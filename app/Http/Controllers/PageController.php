<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Bioudi\LaravelMetaWeatherApi\Weather;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showPage($page=null){
        $lang = 'de';

        if(view()->exists($page)){
            return view($page,compact('lang'));
        } else if (!$page){
            return view('home',compact('lang'));
        }

    }
    public function showPageAR($page=null){
        $lang = 'ar';

        if(view()->exists($page)){
            return view($page,compact('lang'));
        } else if (!$page){
            return view('home',compact('lang'));
        }

    }
    public function showPageEn($page=null){
        $lang = 'en';

        if(view()->exists($page)){
            return view($page,compact('lang'));
        } else if (!$page){
            return view('home',compact('lang'));
        }

    }

    public function getWeather(){
        $weather = new Weather();
        $data['berlin'] = $weather->getByCityName('berlin');
        $data['dubai'] = $weather->getByCityName('dubai');

        $data['berlin_time'] = Carbon::parse($data['berlin']->time)->format('H:i');
        $data['dubai_time'] = Carbon::parse($data['dubai']->time)->format('H:i');

        $data['berlin_day'] = substr(Carbon::parse($data['berlin']->time)->format('l'),0,3);
        $data['dubai_day'] = substr(Carbon::parse($data['dubai']->time)->format('l'), 0,3);

        return response()->json($data);
    }

    public function showArticlePage($slug){
        $lang = 'de';
        $data = Article::where('slug',$slug)->first();
        return view('article',compact('data','lang'));
    }

    public function showArticlePageAR($slug){
        $lang = 'ar';
        $data = Article::where('slug',$slug)->first();

        $data['title'] = $data['title_ar'];
        $data['content'] = $data['content_ar'];

        return view('article',compact('data','lang'));
    }

    public function showArticlePageEN($slug){
        $lang = 'en';
        $data = Article::where('slug',$slug)->first();

        $data['title'] = $data['title_en'];
        $data['content'] = $data['content_en'];

        return view('article',compact('data','lang'));
    }

}
