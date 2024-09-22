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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('phone')->required();
            $table->string('email')->required();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook_review')->nullable();
            $table->string('google_review')->nullable();
            $table->string('page_number')->nullable();
            $table->string('client_photo')->nullable();
            $table->string('service')->nullable();
            $table->string('status')->nullable();
            $table->string('facebook_profile_link')->nullable();
            $table->string('dob')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
