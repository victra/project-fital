<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function(Blueprint $table){
            $table->integer('id', true);
            $table->integer('check_by_id')->index('absensi_check_by')->nullable();
            $table->integer('siswa_id')->index('absensi_siswa_id')->nullable();
            $table->integer('kelas_id')->index('absensi_kelas_id')->nullable();;
            $table->string('status');
            $table->string('description')->nullable();
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });

        //add foreign
        Schema::table('absensi', function(Blueprint $table)
        {
            $table->foreign('check_by_id', 'absensi_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('siswa_id', 'absensi_ibfk_2')->references('id')->on('siswa')->onUpdate('CASCADE')->onDelete('CASCADE');
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
            $table->dropForeign('absensi_ibfk_1');
            $table->dropForeign('absensi_ibfk_2');
        });

        Schema::drop('absensi');
    }
}
