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
        Schema::create('careerfairs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Career Fair');
            $table->mediumText('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('img')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->integer('user')->default(0);
            $table->string('qr')->nullable();
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
        Schema::dropIfExists('careerfairs');
    }
};
