<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name','name_ar','name_en','slug'];

    public  function contents(){
        return $this->hasMany('App\Models\PageContent','page_id','id');
    }

    public  function sections(){
        return $this->hasMany('App\Models\PageSection','page_id','id');
    }

    /**
     * An article has uploads.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function uploads()
    {
        return $this->morphOne('App\Models\Upload', 'uploadable');
    }

    public function sliders(){
        return $this->hasMany('App\Models\PageImageSlide');
    }

}
