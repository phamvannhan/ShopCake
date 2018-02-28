<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdToTypeProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('type_products', function (Blueprint $table) {
            $table->integer("parent_id")->default(0)->index();
            $table->string("icon")->nullable();
            $table->string("style")->nullable();
            $table->string("image_1")->nullable();
            $table->smallInteger("level")->default(0);
            $table->integer("position")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_products', function (Blueprint $table) {
            
            $table->dropColumn('parent_id');
            $table->dropColumn('icon');
            $table->dropColumn('style');
            $table->dropColumn('image_1');
            $table->dropColumn('level');
            $table->dropColumn('position');
        });
    }
}
