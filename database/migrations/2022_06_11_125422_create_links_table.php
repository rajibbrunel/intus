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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('short_url',50)->nullable(); // no need to create short url for problematic 
            $table->string('shortcode',6)->nullable();
            $table->string('hashvalue',256);
            $table->string('protocol',12);
            $table->string('originalurl',400)->unique();
            $table->boolean('safe')->default(false); // safe is store after api call it is updateable 
            $table->json('safe_api_response')->nullable();
            $table->timestamp('last_check')->useCurrent();
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
        Schema::dropIfExists('links');
    }
};
