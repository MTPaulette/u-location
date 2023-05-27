<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Weight::class)
                    ->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Product::class)
                    ->onDelete('cascade');
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('initial_stock')->default(0);
            $table->unsignedInteger('remaining_stock')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weight_products');
    }
};
