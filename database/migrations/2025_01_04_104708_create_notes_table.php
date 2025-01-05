<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('notes', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger("ec_id");
        $table->foreign("ec_id")
            ->references("id")
            ->on("ecs")
            ->onDelete("cascade");
        $table->unsignedBigInteger("etudiant_id");
        $table->foreign("etudiant_id")
            ->references("id")
            ->on("etudiants")
            ->onDelete("cascade");
        $table->double("note");
        $table->string("session");
        $table->date("date_evaluation");
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
