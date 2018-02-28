<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            
            $table->integer("surface_id")->nullable();
            $table->integer("size_id")->nullable();
            $table->float('weight')->nullable();
            $table->integer("producer_id")->nullable();
            $table->tinyInteger("active")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('producer_id');
            $table->dropColumn('surface_id');
            $table->dropColumn('size_id');
            $table->dropColumn('weight');
            $table->dropColumn('active');
        });
    }
}
