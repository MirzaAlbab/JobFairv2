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
        Schema::create('partners_notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('partner_id');
            $table->string('title')->default('Career Fair Job');
            $table->mediumText('message')->nullable();
            $table->string('user')->nullable();
            $table->enum('status', ['delivered','scheduled'])->default('scheduled');
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
        Schema::dropIfExists('partners_notifications');
    }
};
