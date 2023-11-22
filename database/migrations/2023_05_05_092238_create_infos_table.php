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
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();

            $table->string('telephone1')->nullable();
            $table->string('telephone2')->nullable();
            $table->string('telephone3')->nullable();

            $table->string('email')->nullable();

            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();

            $table->string('period')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();

            $table->string('about_title')->nullable();
            $table->string('about_subtitle')->nullable();

            $table->string('about_mission')->nullable();
            $table->string('about_choose')->nullable();

            $table->string('contact_title')->nullable();
            $table->string('contact_subtitle')->nullable();

            $table->string('equipe1')->nullable();
            $table->string('equipe2')->nullable();
            $table->string('equipe3')->nullable();
            $table->string('equipe4')->nullable();

            $table->string('newsletter_title')->nullable();
            $table->string('newsletter_subtitle')->nullable();
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
        Schema::dropIfExists('infos');
    }
};
