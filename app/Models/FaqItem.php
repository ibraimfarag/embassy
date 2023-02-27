<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqItem extends Model
{
    protected $fillable = ['faq_id','question','question_ar','question_de','answer','answer_ar','answer_de'];
}
