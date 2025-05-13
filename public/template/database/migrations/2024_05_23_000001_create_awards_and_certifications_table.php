<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsAndCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('awards_and_certifications', function (
            Blueprint $table
        ) {
            $table->bigIncrements('id');
            $table->string('images');
            $table->string('title');
            $table->string('description');
            $table->string('link');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awards_and_certifications');
    }
}
