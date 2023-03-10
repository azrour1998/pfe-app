<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('email')->unique();
            $table->integer('telephone');
            $table->date('dob');
            $table->text('role');
            $table->text('company');
            $table->string('password');
            $table->text('added_by');
            $table->timestamps();
        });
    }

   
}