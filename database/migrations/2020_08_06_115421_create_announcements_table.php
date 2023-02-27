<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            //'content','content_en','content_ar','icon','link','link_en','link_ar'
            $table->string('title');
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->string('content')->nullable();
            $table->string('content_ar')->nullable();
            $table->string('content_en')->nullable();
            $table->longText('link')->nullable();
            $table->longText('link_ar')->nullable();
            $table->longText('link_en')->nullable();
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('announcements');
    }
}
