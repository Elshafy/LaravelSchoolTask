<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('rigion');
            $table->string('guide_name');
            $table->string('guide_tele');
            $table->string('mod_name');
            $table->string('mod_tele');
            $table->integer('num_11')->default(5);
            $table->integer('num_12')->default(5);
            $table->integer('num_teacher')->default(5);
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
        Schema::dropIfExists('schools');
    }
}
