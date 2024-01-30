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
        Schema::create('md_user_message_interaction', function (Blueprint $table) {
            $table->id();
            $table->string('sender_id')->nullable();
            $table->string('sender_type')->nullable();
            $table->string('conversation_id')->nullable();
            $table->string('room_id')->nullable();
            $table->string('last_read_message')->nullable();
            $table->string('latest_message')->nullable();
            $table->string('conversation_subject')->nullable();
            $table->string('conversation_for')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('modified_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('md_user_message_interaction');
    }
};
