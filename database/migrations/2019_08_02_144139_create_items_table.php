<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('preview_resource')->nullable();
            $table->string('download_resource')->nullable();
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('tag_id');
        Schema::dropIfExists('category_id');
        Schema::dropIfExists('items');
    }
}