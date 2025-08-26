<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('events', function (Blueprint $table) {
        $table->string('status')->default('active')->change();
    });
}

public function down(): void
{
    Schema::table('events', function (Blueprint $table) {
        $table->enum('status', ['active', 'inactive', 'cancelled'])->default('active')->change();
    });
}
};
