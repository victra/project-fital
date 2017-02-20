<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSemester extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('kelas', function(Blueprint $table)
        // {
        //     $table->integer('id', true);
        //     $table->string('semester');
        //     $table->string('thn_ajaran');
        //     $table->string('status'); // aktif atau tidak aktif
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('kelas');
    }
}
