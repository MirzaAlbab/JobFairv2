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
            $table->string('province')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable()->default('Lainnya');
            $table->string('about')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('university')->nullable();
            $table->string('education')->nullable()->default('Lainnya');
            $table->string('faculty')->nullable()->default('Lainnya');
            $table->string('major')->nullable()->default('Lainnya');
            $table->decimal('gpa')->nullable();
            $table->year('graduation_year')->nullable();
            $table->string('cv')->nullable();
            $table->string('photo')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('role');
            $table->string('password');
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
