<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->datetime('date');
            $table->string('location')->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->integer('capacity')->nullable();
            $table->enum('status', ['active', 'inactive', 'cancelled'])->default('active');
            $table->string('category')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
