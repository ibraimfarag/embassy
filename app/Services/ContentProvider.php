<?php

namespace App\Services;

use App\Models\Announcement;
use App\Models\Newsletter;
use App\Models\PageSection;
use App\Models\Article;
use App\Models\Bulletin;
use App\Models\PageImageSlide;
use App\Models\FaqItem;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\Timeline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Psy\Util\Str;
use Bioudi\LaravelMetaWeatherApi\Weather;

class ContentProvider
{
    public function getContent($page, $slug, $lang = null){

        $data = PageContent::whereHas('page',function($q) use ($page) {
            return $q->where('slug',$page);
        })->where('slug',$slug)->first();

        if($data)
            if($lang=="ar")
                return $data->content_ar;
            else
                return $data->content;

        return [];
    }

    public function getContents($page){
        $data = PageSection::whereHas('page',function($q) use ($page) {
            return $q->where('slug',$page);
        })->get();

        $rets = [];

        foreach($data as $item){
            $rets[$item->slug]['name'] = $item->title_en;
            $rets[$item->slug]['name_en'] = $item->title_en;
            $rets[$item->slug]['name_ar'] = $item->title_ar;
            $rets[$item->slug]['de'] = $item->content;
            $rets[$item->slug]['ar'] = $item->content_ar;
            $rets[$item->slug]['en'] = $item->content_en;
            $rets[$item->slug]['type'] = $item->type;
            $rets[$item->slug]['slug'] = $item->slug;
        }

        return $rets;
    }

    public function getSection($page,$sectionId){
        $data = PageSection::where('id',$sectionId)->whereHas('page',function($q) use ($page) {
            return $q->where('slug',$page);
        })->get();

        $rets = [];

        foreach($data as $item){
            $rets[$item->slug]['name'] = $item->title_en;
            $rets[$item->slug]['name_en'] = $item->title_en;
            $rets[$item->slug]['name_ar'] = $item->title_ar;
            $rets[$item->slug]['de'] = $item->content;
            $rets[$item->slug]['ar'] = $item->content_ar;
            $rets[$item->slug]['en'] = $item->content_en;
            $rets[$item->slug]['type'] = $item->type;
            $rets[$item->slug]['slug'] = $item->slug;
        }

        return $rets;
    }

    public function getSettings(){
        $data = PageContent::whereHas('page',function($q) {
            return $q->where('slug','settings');
        })->select('name','content','content_ar','slug','type')->get();

        $rets = [];

        foreach($data as $item){
            $rets[$item->slug] = $item->content;
        }

        return $rets;
    }

    public function getFaq($id,$lang){
        $qs =  FaqItem::where('faq_id',$id)->get();

        $data = [];
        foreach ($qs as $qid=>$q){
            $data[$id.'-'.$q->id]['question'] = $q->question;
            $data[$id.'-'.$q->id]['answer'] = $q->answer;
        }

        return $data;
    }

    public function getTimeline($lang){
        $q =  Timeline::get();

        $data = [];
        foreach ($q as $row){
            $data[$row->id]['date'] = $row->date;
            $data[$row->id]['photo'] = $row->photo;

            if($lang=='ar'){
                $data[$row->id]['content'] = $row->content_ar;
            } elseif ($lang=='en') {
                $data[$row->id]['content'] = $row->content_en;
            } else {
                $data[$row->id]['content'] = $row->content;
            }
        }

        return $data;
    }

    public function getPageNavs(){
        $q =  Page::with('sections')->get();
        return $q;
    }

    public function getArticles($slug,$lang){
        $q =  Article::whereHas('type',function($query) use($slug){
            return $query->where('slug',$slug);
        })->orderBy('publish_date','DESC')->get();

        $data = [];
        foreach ($q as $row){
            $data[$row->id]['publish_date'] = $row->publish_date;
            $data[$row->id]['thumbnail'] = $row->thumbnail;
            $data[$row->id]['featured_image'] = $row->featured_image;
            $data[$row->id]['slug'] = $row->slug;

            if($lang=='ar'){
                $data[$row->id]['title'] = $row->title_ar;
                $data[$row->id]['content'] = $row->content_ar;
                $data[$row->id]['intro'] = \Illuminate\Support\Str::words(strip_tags($row->content_ar),16);
            } elseif ($lang=='en') {
                $data[$row->id]['title'] = $row->title_en;
                $data[$row->id]['content'] = $row->content_en;
                $data[$row->id]['intro'] = \Illuminate\Support\Str::words(strip_tags($row->content_en),16);
            } else {
                $data[$row->id]['title'] = $row->title;
                $data[$row->id]['content'] = $row->content;
                $data[$row->id]['intro'] = \Illuminate\Support\Str::words(strip_tags($row->content),16);
            }
        }

        return $data;
    }

    public function getAnnouncements($lang){
        $q =  Announcement::get();

        $data = [];
        foreach ($q as $row){
            $data[$row->id]['icon'] = $row->icon;

            if($lang=='ar'){
                $data[$row->id]['title'] = $row->title_ar;
                $data[$row->id]['content'] = $row->content_ar;
                $data[$row->id]['link'] =$row->link_ar;
            } elseif ($lang=='en') {
                $data[$row->id]['title'] = $row->title_en;
                $data[$row->id]['content'] = $row->content_en;
                $data[$row->id]['link'] =$row->link_en;
            } else {
                $data[$row->id]['title'] = $row->title;
                $data[$row->id]['content'] = $row->content;
                $data[$row->id]['link'] =$row->link;
            }
        }

        return $data;
    }


    public function getOtherPages(){
        return Article::where('article_type_id','!=',1)->get();;
    }

    public function getBulletins($lang){
        $q =  Bulletin::orderBy('id','DESC')->get();

        $data = [];
        foreach ($q as $row){
            $data[$row->id]['date'] = $row->date;
            $data[$row->id]['file'] = $row->file;

            if($lang=='ar'){
                $data[$row->id]['title'] = $row->title_ar;
                $data[$row->id]['edition'] = $row->edition_ar;
            } elseif ($lang=='en') {
                $data[$row->id]['title'] = $row->title_en;
                $data[$row->id]['edition'] = $row->edition_en;
            } else {
                $data[$row->id]['title'] = $row->title;
                $data[$row->id]['edition'] = $row->edition;
            }
        }

        return $data;
    }

    public function getNewsletters($lang){
        $q =  Newsletter::orderBy('id','DESC')->get();

        $data = [];
        foreach ($q as $row){
            $data[$row->id]['date'] = $row->date;
            $data[$row->id]['file'] = $row->file;

            if($lang=='ar'){
                $data[$row->id]['title'] = $row->title_ar;
                $data[$row->id]['edition'] = $row->edition_ar;
            } elseif ($lang=='en') {
                $data[$row->id]['title'] = $row->title_en;
                $data[$row->id]['edition'] = $row->edition_en;
            } else {
                $data[$row->id]['title'] = $row->title;
                $data[$row->id]['edition'] = $row->edition;
            }
        }

        return $data;
    }

    public function getGalleries($lang){
        $q =  Gallery::with('photos')->get();

        $data = [];
        foreach ($q as $row){
            if($lang=='ar'){
                $data[$row->id]['title'] = $row->title_ar;
            } elseif ($lang=='en') {
                $data[$row->id]['title'] = $row->title_en;
            } else {
                $data[$row->id]['title'] = $row->title;
            }

            $data[$row->id]['photos'] = $row->photos;
            $data[$row->id]['thumbnail'] = $row->thumbnail;
        }

        return $data;
    }

    public function getMenu($lang){
        $q =  Page::get();

        $data = [];
        foreach ($q as $row){
            if($lang=='ar'){
                $data[$row->id]['name'] = $row->name_ar;
            } elseif ($lang=='en') {
                $data[$row->id]['name'] = $row->name_en;
            } else {
                $data[$row->id]['name'] = $row->name;
            }
            $data[$row->id]['slug'] = $row->slug;
        }
        return $data;
    }

    public function getContentFront($page,$lang){

        $contents = PageSection::whereHas('page',function($q) use ($page) {
            return $q->where('slug',$page);
        })->where('parent_section_id','')->get()->toArray();

        $data = [];
        foreach ($contents as $content){

            if($lang=='ar'){
                $data[$content['slug']]['content'] = $content['content_ar'];
                $data[$content['slug']]['title'] = $content['title_ar'];
            }
            elseif($lang=='en'){
                $data[$content['slug']]['content'] = $content['content_en'];
                $data[$content['slug']]['title'] = $content['title_en'];
            }
            else {
                $data[$content['slug']]['content'] = $content['content'];
                $data[$content['slug']]['title'] = $content['title'];
            }
            $data[$content['slug']]['id'] = $content['id'];

            $children = PageSection::where('parent_section_id',$content['id'])->get()->toArray();

            foreach ($children as $child){
                if($lang=='ar'){
                    $data[$content['slug']]['children'][$child['slug']]['content'] = $child['content_ar'];
                    $data[$content['slug']]['children'][$child['slug']]['title'] = $child['title_ar'];
                }
                elseif($lang=='en'){
                    $data[$content['slug']]['children'][$child['slug']]['content'] = $child['content_en'];
                    $data[$content['slug']]['children'][$child['slug']]['title'] = $child['title_en'];
                }
                else {
                    $data[$content['slug']]['children'][$child['slug']]['content'] = $child['content'];
                    $data[$content['slug']]['children'][$child['slug']]['title'] = $child['title'];
                }

                $data[$content['slug']]['children'][$child['slug']]['id'] = $child['id'];
            }
        }

        return $data;
    }

    public function getPageImageSlides($page){

        $data = PageImageSlide::whereHas('page',function($q) use ($page) {
            return $q->where('slug',$page);
        })->get()->toArray();

        return $data;
    }

    public function getTeams($lang){
        $posts = Team::get();

        $data = [];
        foreach ($posts as $post){

            if($lang=='en'){
                $row['name'] = $post->name;
                $row['title'] = $post->title;
                $row['bio'] = $post->bio;
            } else {
                $row['name'] = $post->name_ar;
                $row['title'] = $post->title_ar;
                $row['bio'] = $post->bio_ar;
            }
            $row['photo'] = $post->photo;
            $row['slug'] = \Illuminate\Support\Str::slug($post->name);

            $data[] = $row;
        }

        return $data;
    }

    public function getGovernors($lang){
        $posts = Governor::get();

        $data = [];
        foreach ($posts as $post){

            if($lang=='en'){
                $row['name'] = $post->name;
                $row['title'] = $post->title;
                $row['bio'] = $post->bio;
            } else {
                $row['name'] = $post->name_ar;
                $row['title'] = $post->title_ar;
                $row['bio'] = $post->bio_ar;
            }
            $row['photo'] = $post->photo;
            $row['slug'] = \Illuminate\Support\Str::slug($post->name);

            $data[] = $row;
        }

        return $data;
    }

    public function getFacilities($lang){
        $posts = Facility::get();

        $data = [];
        foreach ($posts as $post){

            if($lang=='en'){
                $row['name'] = $post->name;
                $row['content'] = $post->content;
            } else {
                $row['name'] = $post->name_ar;
                $row['content_ar'] = $post->content_ar;
            }
            $row['slug'] = \Illuminate\Support\Str::slug($post->name);
            $row['photos'] = $post->uploads()->get();

            $data[] = $row;
        }

        return $data;
    }

    public function getTestimonials($lang){
        $posts = Community::get();

        $data = [];
        foreach ($posts as $post){

            $row['name'] = $lang == 'en' ? $post->name : $post->name_ar;
            $row['title'] = $lang == 'en' ? $post->title : $post->title_ar;
            $row['content'] = $lang == 'en' ? $post->content : $post->content_ar;
            $row['slug'] = \Illuminate\Support\Str::slug($post->name);
            $row['photo'] = $post->photo;

            $data[] = $row;
        }

        return $data;
    }

    public function getCareers($lang){
        $posts = Career::get();

        $data = [];
        foreach ($posts as $post){

            $row['title'] = $lang == 'en' ? $post->title : $post->title_ar;
            $row['link'] = $lang == 'en' ? $post->link : $post->link_ar;

            $data[] = $row;
        }

        return $data;
    }


    public function getPosts($page){
        $data = Post::whereHas('page',function($q) use($page) {
            return $q->where('slug',$page);
        })->get();

        $rets = [];
        $paginate = 0;
        $index = 0;

        foreach ($data as $item){
            if($paginate > 5){
                $paginate = 0;
                $index++;
            }
            $rets[$index][] = $item;
            $paginate++;
        }

        return $rets;

    }

    public function getRecentPosts($page){
        $data = Post::whereHas('page',function($q) use($page) {
            return $q->where('slug',$page);
        })->limit(5)->get();

        return $data;

    }

    public function getPartners(){
        return Partner::get();
    }

    public function getPressLinks(){
        return PressLink::get();
    }

    public function getPage($page_id){
        return Page::find($page_id);
    }

    public function getPages(){
        return Page::get();
    }
}
