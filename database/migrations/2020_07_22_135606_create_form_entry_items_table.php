<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormEntryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_entry_items', function (Blueprint $table) {
            $table->id();
            // 'key','value','form_entry_id
            $table->string('key');
            $table->string('value');
            $table->bigInteger('form_entry_id')->unsigned()->index();
            $table->foreign('form_entry_id')->references('id')->on('form_entries')->onDelete('cascade');
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
        Schema::dropIfExists('form_entry_items');
    }
}
