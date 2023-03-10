<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->text('designation')->unique();
            $table->integer('quantity');
            $table->double('price');
            $table->integer('fournisseur_id');
            $table->date('last_arrival');
            $table->integer('minimal_quantity');
            $table->text('image');
            $table->timestamps();
        });
    }
//test
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
