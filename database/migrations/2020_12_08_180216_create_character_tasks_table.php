<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charactertasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ref_character_id');
            $table->unsignedBigInteger('ref_task_id');
            $table->timestamps();

            $table->foreign('ref_character_id')
            ->references('id')
            ->on('characters')
            ->onDelete('cascade');

            $table->foreign('ref_task_id')
            ->references('id')
            ->on('tasks')
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
        Schema::dropIfExists('charactertasks');
    }
}
