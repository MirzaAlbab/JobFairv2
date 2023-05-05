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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('about')->nullable();
            $table->string('phone')->nullable();
            $table->string('education')->nullable();
            $table->string('major')->nullable();
            $table->string('cv')->nullable();
            $table->string('role');
            $table->string('photo')->nullable();
            $table->string('password');
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('status')->default('active');
            $table->foreignId('careerfair_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
