<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_words', function (Blueprint $table) {
            $table->increments('id');
            $table->string('word');
            $table->integer('count')->default(1);
            $table->tinyInteger('status')->default(1)->comment('状态 0:禁用 1:可用');
            $table->timestamps();

            $table->index('word');
            $table->index('count');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
