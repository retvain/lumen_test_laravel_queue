<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid_guid');
            $table->integer('number');
            $table->timestamps();

            $table->foreign('uuid_guid')
                ->references('uuid')
                ->on('guid')
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('number');
    }
}
