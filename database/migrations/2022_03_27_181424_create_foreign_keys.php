<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{

    public function up()
    {

        Schema::table('teachers', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')
                ->onDelete('cascade');
        });
        Schema::table('sections', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade');
        });
        Schema::table('branches', function (Blueprint $table) {
            $table->foreign('school_id')->references('id')->on('schools')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign('teachers_Grade_id_foreign');
        });
    }
}
