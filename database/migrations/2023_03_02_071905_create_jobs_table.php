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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('level');
            $table->enum('kategori', ['part-time', 'full-time'])->default('full-time');
            $table->enum('gaji',['2-3','3-5','6-8', '8-10'])->nullable();
            $table->string('tingkat penempatan');
            $table->string('deskripsi');
            // $table->string('penempatan')->nullable();
            // start date end date
            $table->foreignId('partner_id');
            $table->timestamps();
            // 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
