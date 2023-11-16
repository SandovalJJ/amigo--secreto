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
            $table->string('cc_user');
            $table->string('p_apellido');
            $table->string('s_apellido');
            $table->string('name');
            $table->string('area');
            $table->string('password');
            $table->string('estado');
            $table->string('ip_registro');
            $table->string('f_naci');
            $table->string('genero');
            $table->string('cuenta');

            $table->string('email')->unique();
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
