<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsExcelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_excel', function (Blueprint $table) {
            $table->id();
            $table->string('consecutive');
            $table->string('bar_code');
            $table->string('colony');
            $table->string('address');
            $table->string('postal_code');
            $table->string('federal_entity');
            $table->string('municipal_delegation');
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
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
        Schema::dropIfExists('documents_excel');
    }
}
