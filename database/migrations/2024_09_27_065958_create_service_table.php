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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('service_name')->required();
            $table->string('domain_provider')->nullable();
            $table->date('domain_registration_date')->nullable();
            $table->string('hosting_provider')->nullable();
            $table->date('hosting_registration_date')->nullable();
            $table->integer('hosting_size')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('services');
    }
};