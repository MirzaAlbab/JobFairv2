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
            $table->string('job_title');
            $table->string('type');
            $table->enum('status', ['part-time', 'full-time'])->default('full-time');
            $table->enum('salary',['2-3','3-5','6-8', '8-10'])->nullable();
            $table->enum('graduation',['SMA/SMK','D3/D4','S1', 'S2'])->nullable();
            $table->string('deskripsi');
            $table->string('kota')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->foreignId('partner_id');
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
        Schema::dropIfExists('jobs');
    }
};
