<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('path');
            $table->string('original_name');
            $table->string('file_name');
            $table->string('mime_type');
            $table->string('template');
            $table->integer('uploadable_id')->unsigned()->index()->nullable();
            $table->string('uploadable_type')->nullable();
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
        Schema::drop('uploads');
    }
}
