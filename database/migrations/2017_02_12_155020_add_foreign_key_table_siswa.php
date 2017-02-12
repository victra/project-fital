<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyTableSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add foreign
        Schema::table('siswa', function(Blueprint $table)
        {
            $table->foreign('kelas_id', 'siswa_ibfk_1')->references('id')->on('kelas')->onUpdate('CASCADE')->onDelete('CASCADE');
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
    }
}
