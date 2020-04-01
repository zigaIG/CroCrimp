<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ime');
            $table->string('ocjena');
            $table->integer('duzina');
            $table->integer('broj_spitova');
            $table->mediumtext('opis');
            $table->string('postavio');
            $table->integer('user_id');
/*             $table->integer('sector_id'); */
/* $table->unsignedBigInteger('sector_id')->nullable();
$table->foreign('sector_id')->references('id')->on('sectors')->onDelete('set null');
 */
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
        Schema::dropIfExists('routes');
    }
}
