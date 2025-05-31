<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id('idServiceOrder');
            $table->string('serviceOrder');
            $table->string('AssignedTo');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('clientId');
            $table->unsignedBigInteger('addressId');
            $table->timestamps();

            $table->foreign('userId')->references('idUser')->on('users')->onDelete('set null');
            $table->foreign('clientId')->references('idClient')->on('clients')->onDelete('set null');
            $table->foreign('addressId')->references('idAddress')->on('Addresses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};
