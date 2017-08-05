<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('标识名称');
            $table->string('display_name')->comment('显示名称');
            $table->integer('parent_id')->default(0)->comment('父级ID');
            $table->integer('order')->default(0)->comment('排序');
            $table->boolean('show_nav')->default(0)->comment('是否显示到导航');
            $table->boolean('show_home')->default(0)->comment('是否显示到首页');
            $table->tinyInteger('show_column')->default(12)->comment('显示到首页所占用的大小, 最大12');

            $table->index('order');
            $table->index('parent_id');
            $table->index('show_home');
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
        Schema::drop('categories');
    }
}
