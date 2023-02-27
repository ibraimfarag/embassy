<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    protected $fillable = ['title','ip'];

    public function items(){
        return $this->hasMany('App\Models\FormEntryItem');
    }
}
