<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    protected $fillable = ['photo','thumbnail','title_ar','title_en','title','gallery_id'];
}
