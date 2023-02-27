<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{

    protected $fillable = ['page_id','name','slug','content', 'content_ar','content_en','type'];

    public function page(){
        return $this->hasOne('App\Models\Page','id','page_id');
    }

    public function getPageAttribute(){
        return $this->page()->first();
    }
}
