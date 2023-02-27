<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title','title_ar','title_en','thumbnail'];

    public function photos(){
        return $this->hasMany('App\Models\GalleryPhoto','gallery_id','id');
    }
}
