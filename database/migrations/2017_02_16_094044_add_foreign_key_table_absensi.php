<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyTableAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add foreign
        Schema::table('absensi', function(Blueprint $table)
        {
            $table->foreign('kelas_id', 'absensi_ibfk_3')->references('id')->on('kelas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensi', function(Blueprint $table)
        {
            $table->dropForeign('absensi_ibfk_3');
        });
    }
}
