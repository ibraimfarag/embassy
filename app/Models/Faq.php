<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['title','page_section_id'];

    public function items(){
        return $this->hasMany('App\Models\FaqItem','faq_id','id');
    }
}
