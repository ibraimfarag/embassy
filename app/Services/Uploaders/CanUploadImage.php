<?php namespace App\Services\Uploaders;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface CanUploadImage {

    /**
     * Upload an image.
     *
     * @param  UploadedFile $image
     *
     * @return array
     */
    public function uploadImage(UploadedFile $image);

}