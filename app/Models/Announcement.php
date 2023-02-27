<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['title','title_en','title_ar','content','content_en','content_ar','icon','link','link_en','link_ar'];
}
