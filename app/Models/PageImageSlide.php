<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageImageSlide extends Model
{
    protected $fillable = ['page_id','photo'];

    public function page(){
        return $this->hasOne('App\Models\Page','id','page_id');
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

    public function getLandscapeAttribute(){
        $data = $this->uploads()->where('template','landscape')->first();

        if($data==null)
            return [];

        return $data;
    }

    public function getSquareAttribute(){
        $data = $this->uploads()->where('template','square')->first();

        if($data==null)
            return [];

        return $data;
    }

}
