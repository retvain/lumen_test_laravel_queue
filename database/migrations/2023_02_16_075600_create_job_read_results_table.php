<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobReadResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_read_results', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->boolean('result');
            $table->timestamps();

            $table->foreign('uuid')
                ->references('job_guid_generate_uuid')
                ->on('job_guid_generate_results')
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
        Schema::dropIfExists('job_read_results');
    }
}
