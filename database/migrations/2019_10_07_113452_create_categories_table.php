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
            $table->string('name',50)->default('')->comment('标识符');
            $table->string('title',50)->default('')->comment('名称');
            $table->integer('pid')->default(0)->comment('上级id');
            $table->integer('sort')->default(0)->comment('排序');
            $table->tinyInteger('list_row')->default(15)->comment('每页行数');
            $table->string('meta_title',100)->default('')->comment('SEO网页标题');
            $table->string('keywords',255)->default('')->comment('关键字');
            $table->string('description',255)->default('')->comment('描述');
            $table->string('template_index',100)->default('')->comment('频道页模板');
            $table->string('template_list',100)->default('')->comment('列表页模板');
            $table->string('template_detail',100)->default('')->comment('详情页模板');
            $table->string('template_edit',100)->default('')->comment('编辑页模板');
            $table->string('model',100)->default('')->comment('列表模型');
            $table->string('model_sub',100)->default('')->comment('子文档模型');
            $table->string('link',255)->default('')->comment('外链');
            $table->tinyInteger('display')->default(1)->comment('可见性');
            $table->tinyInteger('status')->default(1)->comment('数据状态');
            $table->integer('icon')->default(0)->comment('分类图表');
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
        Schema::dropIfExists('categories');
    }
}
