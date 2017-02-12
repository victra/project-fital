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
            $table->string('nis');
            $table->string('nama');
            $table->string('jkl');
            $table->string('agama');
            $table->integer('kelas')->index('siswa_kelas')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        //add foreign
        Schema::table('siswa', function(Blueprint $table)
        {
            $table->foreign('kelas', 'siswa_ibfk_1')->references('id')->on('kelas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswa', function(Blueprint $table)
        {
            $table->dropForeign('siswa_ibfk_1');
        });

        Schema::drop('siswa');
    }
}
