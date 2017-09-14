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
        Schema::dropIfExists('menus');
        
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_en');
            $table->string('menu_id');
            $table->integer('parentid')->nullable()->default(null);
            $table->string('class')->nullable();
            $table->string('url')->nullable();
            $table->string('user_group')->nullable();
            $table->integer('order_number')->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
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
