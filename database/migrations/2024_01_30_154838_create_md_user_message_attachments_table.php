<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMdUserMessageAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_user_message_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_type');
            $table->string('attachment_name');
            $table->string('attachment_path');
            $table->string('conversation_id');
            $table->timestamps();

            // Foreign key constraint for user_id
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // You can define additional foreign key constraints if necessary
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('md_user_message_attachments');
    }
}
