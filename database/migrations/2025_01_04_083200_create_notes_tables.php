<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('etudiants_id')->constrained('etudiants')->onDelete('cascade'); 
            $table->foreignId('elements_constitutifs_id')->constrained('elements_constitutifs')->onDelete('cascade');
            $table->decimal('note', 5, 2); 
            $table->enum('session', ['normale', 'rattrapage']);
            $table->date('date_evaluation'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
