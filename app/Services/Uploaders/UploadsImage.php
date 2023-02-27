<?php namespace App\Services\Uploaders;

use App\Exceptions\MissingTemplatePathException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait UploadsImage {

    /**
     * @var Image
     */
    protected $image;

    /**
     * The image extensions that are allowed to be uploaded.
     *
     * @var array
     */
    protected $allowedImages = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];

    /**
     * Upload an image.
     *
     * @param  UploadedFile $image
     *
     * @return array
     */
    public function uploadImage(UploadedFile $image)
    {
        $files = [];
        $templates = $this->getImageTemplates();

        foreach ($templates as $template)
        {
            $files[] = $this->saveImage($image, $template);
        }

        return $files;
    }

    /**
     * Get the templates to be used when uploading an image.
     *
     * @return array 
     */
    abstract protected function getImageTemplates();

    /**
     * Save the image to the target upload directory.
     *
     * @param  UploadedFile $image
     * @param  array        $template
     *
     * @return array
     */
    private function saveImage(UploadedFile $image, array $template)
    {
        $preparedImage = $this->prepareImage($image, $template);

        $fileName = $this->createFileName($image);
        $path = $this->getRelativePath($this->getTemplatePath($template));

        $uploadPath = $this->getUploadPath($path, $fileName);

        $preparedImage->save($uploadPath);

        return $this->createPayload($image->getClientOriginalName(),
                                    $fileName,
                                    $path, 
                                    $image->getClientMimeType(),
                                    $this->getTemplateName($template));
    }

    /**
     * Prepare the image to be uploaded.
     *
     * @param  UploadedFile $image
     * @param  array        $template
     *
     * @return \Intervention\Image\Image
     */
    private function prepareImage(UploadedFile $image, array $template)
    {
        $imageToSave = $this->image->make($image->getRealPath())->orientate();

        if ($sizes = $this->getSizes($template))
        {
            $imageToSave->fit($sizes['width'], $sizes['height'], function($constraint)
            {
                $constraint->aspectRatio();
            });
        }

        return $imageToSave;
    }

    /**
     * Get the path from the template array.
     *
     * @param  array $template 
     *
     * @return string
     * 
     * @throws MissingTemplatePathException
     */
    private function getTemplatePath($template)
    {
        if ( ! isset($template['path']))
        {
            throw new MissingTemplatePathException;
        }

        return $template['path'];
    }

     /**
     * Get the template name.
     *
     * @param  array $template 
     *
     * @return string
     */
    private function getTemplateName($template)
    {
        if ( ! isset($template['name']))
        {
            $name = 'original';
        }

        return $template['name'];
    }

    /**
     * Get the width and height from the template.
     *
     * @param  array  $template
     *
     * @return array
     */
    private function getSizes(array $template)
    {
        if ( ! isset($template['width']) && ! isset($template['height']))
        {
            return null;
        }

        $width = isset($template['width']) ? $template['width'] : null;
        $height = isset($template['height']) ? $template['height'] : null;

        return compact('width', 'height');
    }

    /**
     * Determine the file if it is an image.
     *
     * @param  UploadedFile $file
     *
     * @return boolean
     */
    protected function isImage(UploadedFile $file)
    {
        $fileExtension = strtolower($file->getClientOriginalExtension());

        if (in_array($fileExtension, $this->allowedImages))
        {
            return true;
        }

        return false;
    }
}