<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableGuruPiket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_piket', function (Blueprint $table) {
            $table->integer ('nip') -> primary();
            $table->string('nama');
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
        Schema::drop('guru_piket');
    }
}
