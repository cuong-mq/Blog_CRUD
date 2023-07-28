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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 515);
            $table->string('slug', 1024);
            $table->text('description');
            $table->text('content');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
