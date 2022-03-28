<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('period_id')->default(1);
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();
            $table->foreignId('section_id')->constrained()->cascadeOnDelete();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete();
            $table->integer('atteend')->default(20);
            $table->integer('disapper')->default(20);;
            $table->integer('bad')->default(20);;
            $table->integer('not_bad')->default(20);;
            $table->integer('mid')->default(20);;
            $table->integer('good')->default(20);;
            $table->integer('excelente')->default(20);;
            $table->integer('success')->default(20);;
            $table->integer('fail')->default(20);;
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
        Schema::dropIfExists('tests');
    }
}
