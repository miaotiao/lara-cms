<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('name',100)->default('')->comment('配置项键名');
            $table->string('title',100)->default('')->comment('配置项名');
            $table->string('remark',100)->default('')->comment('配置项补充说明');
            $table->tinyInteger('type')->default(1)->comment('类型；不建议设置');
            $table->tinyInteger('group')->default(1)->comment('配置分组；不建议设置');
            $table->string('extra',250)->default('')->comment('配置项可选项目');
            $table->text('value')->nullable()->comment('配置项键值');
            $table->integer('sort')->default(1)->comment('排序');
            $table->tinyInteger('status')->default(1)->comment('配置状态。0:禁用;1:启用');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
