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
        Schema::create('advantage_products', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Advantage::class)
                    ->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Product::class)
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advantage_products');
    }
};
