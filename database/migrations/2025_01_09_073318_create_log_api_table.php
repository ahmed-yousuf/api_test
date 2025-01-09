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
        Schema::create('log_api', function (Blueprint $table) {
            $table->id();
            $table->string('vin')->nullable();
            $table->string('ip_address');
            $table->string('user_agent');
            $table->integer('status_code');
            $table->float('response_time_ms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_api');
    }
};
