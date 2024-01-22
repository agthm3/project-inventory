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
        Schema::create('input_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('verificationdate');
            $table->string('ponumber');
            $table->longText('deskripsi');
            $table->string('quantity');
            $table->string('receivedby');
            $table->string('user');
            $table->string('storagelocation');
            $table->string('vehiclenumber');
            $table->string('supplier');
            $table->string('remark');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_data');
    }
};
