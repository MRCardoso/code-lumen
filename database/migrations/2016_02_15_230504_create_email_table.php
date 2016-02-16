<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->string('email');
            $table->enum('type', ['personal', 'commercial']);
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->foreign('person_id')
                ->references('id')
                ->on('person')
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
        Schema::drop('email');
    }
}
