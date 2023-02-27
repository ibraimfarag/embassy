<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();
            // 'question','question_ar','question_de','answer','answer_ar','answer_de'
            $table->bigInteger('faq_id')->unsigned()->index();
            $table->foreign('faq_id')->references('id')->on('faqs')->onDelete('cascade');
            $table->text('question');
            $table->text('question_ar')->nullable();
            $table->text('question_de')->nullable();
            $table->text('answer');
            $table->text('answer_ar')->nullable();
            $table->text('answer_de')->nullable();
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
        Schema::dropIfExists('faq_items');
    }
}
