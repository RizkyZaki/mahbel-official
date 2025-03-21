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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('title');
            $table->string('keyword');
            $table->text('description');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('link_facebook');
            $table->string('link_twitter');
            $table->string('link_tiktok');
            $table->string('link_instagram');
            $table->string('link_shopee');
            $table->string('link_tokopedia');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
