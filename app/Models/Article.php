<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','title_ar','title_en','slug','content','content_ar','content_en','publish_date','thumbnail','featured_image','external_link','article_type_id'];

    public function type(){
        return $this->hasOne('App\Models\ArticleType','id','article_type_id');
    }
}
