<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoolpressTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boolpress_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('boolpress_id');
            $table->foreign('boolpress_id')
            ->references('id')
            ->on('boolpresses');

            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')
            ->references('id')
            ->on('tags');

            $table->primary(['boolpress_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boolpress_tag');
    }
}
