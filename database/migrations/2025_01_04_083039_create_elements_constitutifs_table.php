<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('elements_constitutifs', function (Blueprint $table) {
            $table->id(); 
            $table->string('code', 50)->unique(); 
            $table->string('nom', 255);
            $table->decimal('coefficient', 4, 2);
            $table->foreignId('unites_enseignement_id')
                  ->constrained('unites_enseignement')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('elements_constitutifs');
    }
};
