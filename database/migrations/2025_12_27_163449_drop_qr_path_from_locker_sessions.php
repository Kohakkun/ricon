<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('locker_sessions', function (Blueprint $table) {
            if (Schema::hasColumn('locker_sessions', 'qr_path')) {
                $table->dropColumn('qr_path');
            }
        });
    }

    public function down(): void
    {
        Schema::table('locker_sessions', function (Blueprint $table) {
            $table->string('qr_path')->nullable();
        });
    }
};
