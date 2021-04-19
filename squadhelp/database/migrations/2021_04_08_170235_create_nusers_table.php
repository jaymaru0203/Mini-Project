<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nusers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->string('year')->nullable();
            $table->string('branch');
            $table->string('user_email');
            $table->string('password');
            $table->string('image')->default('null.jpg');
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
        Schema::dropIfExists('nusers');
    }
}
