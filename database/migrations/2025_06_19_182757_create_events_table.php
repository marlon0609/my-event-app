<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Exécuter les migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->dateTime('event_date');
            $table->string('lieu')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Annuler la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
// Note: This migration creates the 'events' table with necessary fields for an event management system.
// It includes fields for title, slug, description, date, location, and image, along with timestamps for created_at and updated_at.