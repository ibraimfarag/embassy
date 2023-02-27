<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = ['title','title_ar','title_en','edition','edition_ar','edition_en','date','file'];
}
