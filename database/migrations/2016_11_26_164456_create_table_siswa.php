<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('nis')->unique();
            $table->string('nama');
            $table->string('jkl');
            $table->string('agama');
            $table->integer('kelas_id')->index('siswa_kelas_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('siswa');
    }
}
