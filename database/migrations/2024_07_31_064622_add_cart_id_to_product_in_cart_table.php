<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCartIdToProductInCartTable extends Migration
{
    public function up()
    {
        Schema::table('product_in_cart', function (Blueprint $table) {
            $table->string('cart_id')->after('product_id');
        });
    }

    public function down()
    {
        Schema::table('product_in_cart', function (Blueprint $table) {
            $table->dropColumn('cart_id');
        });
    }
}
