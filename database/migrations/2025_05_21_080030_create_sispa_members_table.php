<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSispaMembersTable extends Migration
{
    public function up()
    {
        Schema::create('application', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ic');
            $table->string('email');
            $table->string('no_matrik')->unique();
            $table->float('height'); // in cm
            $table->float('weight'); // in kg
            $table->float('bmi');
            $table->integer('tempoh_pengajian');
            $table->string('kelayakan')->default('Tidak Layak'); // status: Layak or Tidak Layak
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('application');
    }
}
