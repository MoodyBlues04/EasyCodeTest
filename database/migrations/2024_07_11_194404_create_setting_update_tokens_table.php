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
        Schema::create('setting_update_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->string('token');
            $table->foreignId('user_setting_id');
            $table->foreign('user_setting_id')
                ->references('id')
                ->on('user_has_settings')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_update_tokens');
    }
};
