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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('registration_type');
            $table->string('name');
            $table->string('email');
            $table->string('company');
            $table->string('phone');
            $table->string('speaker_talk_title')->nullable();
            $table->text('speaker_talk_summary')->nullable();
            $table->json('conferences');
            $table->boolean('terms_agree')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
