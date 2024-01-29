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
        Schema::create('histories', function (Blueprint $table) {
              $table->id();
            $table->unsignedBigInteger('input_data_id')->nullable(); // Tambahkan baris ini
            $table->foreign('input_data_id')->references('id')->on('input_data'); // Tambahkan baris ini
            $table->string('name');
            $table->string('requestdate');
            $table->string('requestor');
            $table->string('department');
            $table->string('ponumber');
            $table->longText('notes');
            $table->string('from_note');
            $table->string('to_note');
            $table->string('quantity');
            // Dalam migration file
            $table->string('image')->nullable()->default('path/to/default/image.jpg');
            $table->string('vehiclenumber')->default(null);
            $table->enum('status', ['pending', 'failed','success'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
