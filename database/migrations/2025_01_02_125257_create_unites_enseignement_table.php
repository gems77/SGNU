<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitesEnseignementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unites_enseignement', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique(); 
            $table->string('nom', 255); 
            $table->integer('credits_ects');
            $table->tinyInteger('semestre')
                  ->unsigned()
                  ->checkBetween(1, 6);
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
        Schema::dropIfExists('unites_enseignement');
    }
}
