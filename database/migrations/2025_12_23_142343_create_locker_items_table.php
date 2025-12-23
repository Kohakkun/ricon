<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('locker_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('session_id')
                  ->constrained('locker_sessions')
                  ->cascadeOnDelete();

            $table->string('item_name');
            $table->text('item_detail')->nullable();

            $table->timestamp('added_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('locker_items');
    }
};
