<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyTableKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //add foreign
        // Schema::table('kelas', function(Blueprint $table)
        // {
        //     $table->foreign('semester_id', 'kelas_ibfk_2')->references('id')->on('semester')->onUpdate('CASCADE')->onDelete('CASCADE');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //  Schema::table('kelas', function(Blueprint $table)
        // {
        //     $table->dropForeign('kelas_ibfk_2');
        // });
    }
}
