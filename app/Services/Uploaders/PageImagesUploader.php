<?php namespace App\Services\Uploaders;

use Intervention\Image\ImageManager as Image;
use Illuminate\Filesystem\Filesystem as File;

class PageImagesUploader extends Uploader implements CanUploadImage {

    use UploadsImage;

    /**
     * @var File
     */
    protected $file;

    /**
     * The target directory of the upload file.
     *
     * @var string
     */
    protected $directoryPath = 'uploads/pages';

    /**
     * Create the uploader class.
     *
     * @param Image $image
     * @param File  $file
     */
    public function __construct(Image $image,  File $file)
    {
        $this->image = $image;
        $this->file = $file;
    }

    /**
     * Get the templates to be used when uploading an image.
     *
     * @return array
     */
    protected function getImageTemplates()
    {
        return [
            [
                'name' => 'short',
                'path' => $this->directoryPath . '/images',
                'width' => 1120,
                'height' => 300,
            ],
            [
                'name' => 'page',
                'path' => $this->directoryPath . '/images',
                'width' => 824,
                'height' => 300,
            ],
            [
                'name' => 'original',
                'path' => $this->directoryPath . '/images',
            ]
        ];
    }
}
