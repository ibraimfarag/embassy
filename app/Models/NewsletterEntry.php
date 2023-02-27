<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterEntry extends Model
{
    protected $fillable = ['name','position','organization','phone','email'];
}
