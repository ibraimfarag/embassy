<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'original_name',
        'file_name',
        'mime_type',
        'uploadable_type',
        'uploadable_id',
        'mime_type',
        'template',
        'caption',
        'caption_ar',
        'status'
    ];

    /**
     * Gets the url attribute of the uploaded file.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return $this->path . '/' . $this->file_name;
    }

    /**
     * Define a polymorphic, inverse one-to-one or many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function uploadable()
    {
        return $this->morphTo();
    }

    /**
     * Check if the uploaded file is image.
     *
     * @return boolean
     */
    public function isImage()
    {
        return preg_match('/(image\/[^\s]+)/', $this->mime_type);
    }

    public function createInstance($request){
        foreach($request as $index=>$item){
            $data[$index] = new static([
                'original_name' => $item['original_name'],
                'file_name' => $item['file_name'],
                'path' => $item['path'],
                'mime_type' => $item['mime_type'],
                'template' => $item['template'],
            ]);
        }
        return $data;
    }
}
