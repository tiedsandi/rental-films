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
        if (!Schema::hasTable('customers')) {
            Schema::create('customers', function (Blueprint $table) {
                $table->id();
                $table->string('full_name');
                $table->enum('salutation', ['Mr.', 'Ms.']);
            });
        }
        if (!Schema::hasTable('movies')) {
            Schema::create('movies', function (Blueprint $table) {
                $table->id();
                $table->string('title');
            });
        }
        if (!Schema::hasTable('addresses')) {
            Schema::create('addresses', function (Blueprint $table) {
                $table->id();
                $table->foreignId('customers_id')->constrained('customers')->cascadeOnDelete();
                $table->$table->text('address');
            });
        }
        if (!Schema::hasTable('rentals')) {
            Schema::create('rentals', function (Blueprint $table) {
                $table->id();
                $table->foreignId('address_id')->constrained('addresses')->cascadeOnDelete();
                $table->foreignId('movie_id')->constrained('movies')->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
