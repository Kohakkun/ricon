<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('locker_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_code')->unique();
            $table->foreignId('locker_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // booking user
            $table->foreignId('assigned_taker_id')->nullable()
                  ->constrained('takers')->nullOnDelete();
            $table->foreignId('taken_by')->nullable()
                  ->constrained('takers')->nullOnDelete();
            $table->enum('status', ['active', 'completed'])->default('active');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('taken_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('locker_sessions');
    }
};
