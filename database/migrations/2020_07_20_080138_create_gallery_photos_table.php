<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //'photo','thumbnail','title_ar','title_de','title','gallery_id'
        Schema::create('gallery_photos', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail');
            $table->string('photo');
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->bigInteger('gallery_id')->unsigned()->index();
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_photos');
    }
}
