<?php

use App\Models\posistion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('tele');
            $table->string('name')->unique();
            $table->string('idnum')->unique();
            $table->string('filenum')->nullable();
            $table->string('specialized')->nullable();
            $table->bigInteger('position_id')->unsigned();
            $table->bigInteger('school_id')->unsigned();
            $table->date('added')->default(now());
            $table->string('address')->nullable();
            $table->timestamps();
            // $table->foreign('school_id')->references('id')->on('school')
            //     ->onDelete('cascade'); //! in FILE FORIGN KEY MIGRATE

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
