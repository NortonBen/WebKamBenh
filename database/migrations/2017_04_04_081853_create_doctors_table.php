<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unsignedInteger("specialist_id");
            $table->text("detail");
            $table->timestamps();
            $table->primary('id');
            $table->foreign("specialist_id")->references('id')->on('specialists')
                ->onDelete('cascade');
            $table->foreign("id")->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
