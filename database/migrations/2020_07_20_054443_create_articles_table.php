<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            // 'title','title_ar','title_de','slug','content','content_ar','content_de','publish_date','thumbnail','featured_image'
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->longText('content')->nullable();
            $table->longText('content_ar')->nullable();
            $table->longText('content_en')->nullable();
            $table->date('publish_date');
            $table->text('thumbnail');
            $table->text('featured_image');
            $table->string('external_link')->nullable();
            $table->bigInteger('article_type_id')->unsigned()->index();
            $table->foreign('article_type_id')->references('id')->on('article_types')->onDelete('cascade');
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
        Schema::dropIfExists('articles');
    }
}
