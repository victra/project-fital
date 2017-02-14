<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function(Blueprint $table)
        {
            $table->integer('id', true);     
            $table->string('kd')->unique();
            $table->string('nama_kelas');
            $table->string('jurusan');
            $table->integer('wali_kelas_id')->index('kelas_wali_kelas_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        //add foreign
        Schema::table('kelas', function(Blueprint $table)
        {
            $table->foreign('wali_kelas_id', 'kelas_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kelas', function(Blueprint $table)
        {
            $table->dropForeign('kelas_ibfk_1');
        });

        Schema::drop('kelas');
    }
}
