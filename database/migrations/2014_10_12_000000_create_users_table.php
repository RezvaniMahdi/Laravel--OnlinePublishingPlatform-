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
            $table->string('name', 50);
            $table->binary('photo')->nullable();
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->string('biography', 200)->nullable();
            $table->string('phone_number', 11)->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender',['male','female','other'])->default('other');
            $table->enum('type',['admin','user'])->default('user');
            $table->enum('active',['yes', 'no'])->default('yes');
            $table->integer('num_followers')->default(0);
            $table->string('facebook', 60)->nullable();
            $table->string('linkdin', 60)->nullable();
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
