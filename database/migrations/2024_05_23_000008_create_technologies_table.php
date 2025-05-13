<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Background');
            $table->string('Slogan');
            $table->string('SubTitle');
            $table->text('Description');
            $table->foreignId('categories_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
}
