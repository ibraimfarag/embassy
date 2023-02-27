<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class PageSection extends Model
{
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'title' => 10,
            'title_ar' => 6,
            'title_en' => 5,
            'content' => 9,
            'content_ar' => 8,
            'content_en' => 7,
        ]
    ];

    protected $fillable = ['slug','title','title_ar','title_en','page_id','parent_section_id','content','content_ar','content_en'];

    public function page(){
        return $this->hasOne('App\Models\Page','id','page_id');
    }
}
