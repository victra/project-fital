<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->string('nip') -> primary();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role');
            $table->string('jkl');
            $table->string('agama');
            $table->string('tlp');
            $table->string('id_user');
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
        Schema::drop('guru');
    }
}
