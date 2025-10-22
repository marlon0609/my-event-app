<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->foreignId('transaction_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedInteger('quantity')->default(1);
            $table->unsignedBigInteger('amount'); // total en FCFA
            $table->string('currency', 10)->default('FCFA');
            $table->string('status')->default('pending'); // pending|paid|cancelled|refunded
            $table->string('reference')->unique();
            $table->json('meta')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'event_id']);
            $table->index(['status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
