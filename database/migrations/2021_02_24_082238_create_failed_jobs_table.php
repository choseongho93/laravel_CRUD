<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlite')->create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('connection')->default('');
            $table->text('queue')->default('');
            $table->longText('payload')->default('');
            $table->longText('exception')->default('');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sqlite')->dropIfExists('failed_jobs');
    }
}
