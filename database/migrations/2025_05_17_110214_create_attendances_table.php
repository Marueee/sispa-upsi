<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->boolean('is_present')->default(false);
            $table->timestamps();

            $table->unique(['event_id', 'member_id']); // Prevent duplicate attendance
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};
