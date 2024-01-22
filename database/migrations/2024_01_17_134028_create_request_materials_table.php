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
        Schema::create('request_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('requestdate');
            $table->string('requestor');
            $table->string('department');
            $table->string('ponumber');
            $table->longText('notes');
            $table->string('from_note');
            $table->string('to_note');
            $table->string('vehiclenumber');
            $table->enum('status', ['pending', 'failed','success'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_materials');
    }
};
