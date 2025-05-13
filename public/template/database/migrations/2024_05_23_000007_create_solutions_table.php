<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Background1');
            $table->string('Slogan');
            $table->string('Background2');
            $table->string('Title');
            $table->text('Description');
            $table->text('Content');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solutions');
    }
}
