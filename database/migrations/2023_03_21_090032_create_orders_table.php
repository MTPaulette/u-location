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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained()->onDelete('cascade');
            // $table->string('confirmation_number')->nullable();
            // $table->string('email')->nullable();
            // $table->string('name')->nullable();
            // $table->string('name_on_card')->nullable();
            // $table->string('city')->nullable();
            $table->foreignIdFor(\App\Models\Address::class)->default(2);
            // $table->string('address')->nullable();
            // $table->string('state')->nullable();
            // $table->string('zip_code')->nullable();
            
            $table->integer('discount')->default(0);
            $table->string('discount_code')->nullable();
            $table->integer('subtotal')->default(0);
            $table->integer('tax')->default(0);
            $table->integer('total')->default(0);
            $table->boolean('shipped')->default(false);
            $table->boolean('paiement_mode')->default(true);
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
        Schema::dropIfExists('orders');
    }
};
