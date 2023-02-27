<?php namespace App\Services;

use Illuminate\Support\Str;

trait CanCreateSlug {

    public function generateSlug($string){
        $slug = Str::slug($string);
        $existFlag = true;
        $index = 1;
        $temp_slug = $slug;

        while($existFlag==true){
            $existFlag=false;
            $check = $this->model->where('slug' , $temp_slug)->count();

            if($check>0) {
                $existFlag = true;
                $temp_slug = $slug."-".$index;
            }

            $index++;
        }
        return $temp_slug;
    }
}
