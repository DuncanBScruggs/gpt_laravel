<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ref_location_id');
            $table->unsignedBigInteger('ref_parent_id')->nullable();
            $table->text('task');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('ref_location_id')
            ->references('id')
            ->on('locations')
            ->onDelete('cascade');

            $table->foreign('ref_parent_id')
            ->references('id')
            ->on('locations')
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
        Schema::dropIfExists('tasks');
    }
}
