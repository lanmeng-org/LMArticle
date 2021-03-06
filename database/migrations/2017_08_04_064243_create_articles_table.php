<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title')->comment('文章标题');
            $table->integer('category_id')->comment('所属分类ID');
            $table->text('content')->comment('文章内容');
            $table->string('keywords')->nullable()->comment('文章关键词');
            $table->integer('view_number')->default(0)->comment('浏览次数');
            $table->integer('position')->default(0)->comment('推荐位 1:文章页推荐 2:栏目页推荐 4:全站推荐');
            $table->timestamps();

            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
