<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100)->default('')->comment('名称');
            $table->integer('pid')->default(0)->comment('上级id');
            $table->integer('sort')->default(0)->comment('排序');
            $table->string('url',250)->default('')->comment('url地址');
            $table->tinyInteger('hide')->default(0)->comment('是否隐藏');
            $table->string('remark',250)->default('')->comment('提示');
            $table->string('group',50)->default('')->comment('分组');
            $table->tinyInteger('is_dev')->default(0)->comment('是否仅开发者模式可见');
            $table->tinyInteger('status')->default(1)->comment('配置状态。0:禁用;1:启用');
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
        Schema::dropIfExists('menus');
    }
}
