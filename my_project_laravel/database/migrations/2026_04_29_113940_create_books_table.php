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
        Schema::create('books', function (Blueprint $table) {
        $table->id(); // បង្កើត id (Primary Key)
        $table->string('title'); // ចំណងជើងសៀវភៅ
        $table->string('author'); // ឈ្មោះអ្នកនិពន្ធ
        $table->decimal('price', 8, 2); // តម្លៃ (លេខទសភាគ)
        $table->date('published_date'); // ថ្ងៃខែឆ្នាំបោះពុម្ព
        $table->timestamps(); // បង្កើត created_at និង updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
