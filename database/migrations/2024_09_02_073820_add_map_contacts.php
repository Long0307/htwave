<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMapContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->text('map')->change(); // hoặc mediumText(), longText() tùy thuộc vào kích thước dữ liệu
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('map', 255)->change(); // hoặc trả về kiểu dữ liệu ban đầu nếu cần
        });
    }
}
