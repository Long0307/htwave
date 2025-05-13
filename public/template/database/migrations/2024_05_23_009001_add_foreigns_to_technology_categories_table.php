<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToTechnologyCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('technology_categories', function (Blueprint $table) {
            $table
                ->foreign('category_id')
                ->references('id')
                ->on('technologies')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technology_categories', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
}
