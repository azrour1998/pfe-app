<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->text('categorie');
            $table->timestamps();
        });
        DB::table('categories')->insert([
            ['categorie' => 'Santé et beauté'],
            ['categorie' => 'Article de sport'],
            ['categorie' => 'Article pour bébés et enfants'],
            ['categorie' => 'Produit artisanaux'],
            ['categorie' => 'Alimentation et boissons'],
            ['categorie' => 'informatique et bureau'],
            ['categorie' => 'Cuisine et maison'],
            ['categorie' => 'Bricolage, Jardin & animalerie'], 
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
