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
        Schema::create('moduluak_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modulua_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('modulua_id')->references('id')->on('moduluaks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moduluak_user');
    }
};
