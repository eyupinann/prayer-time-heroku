<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prayer_time', function (Blueprint $table) {
            $table->id();
            $table->string('date',500);
            $table->string('imsak',250);
            $table->string('sabah',250);
            $table->string('ogle',250);
            $table->string('ikindi',250);
            $table->string('aksam',250);
            $table->string('yatsı',250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prayer_time');
    }
};
