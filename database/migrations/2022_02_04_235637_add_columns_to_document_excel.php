<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDocumentExcel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents_excel', function (Blueprint $table) {
            $table->string('letter_type')->nullable();
            $table->string('nss')->nullable();
            $table->string('production_order')->nullable();
            $table->string('date_issue')->nullable();
            $table->string('event')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents_excel', function (Blueprint $table) {
            //
        });
    }
}
