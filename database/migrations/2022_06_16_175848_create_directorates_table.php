<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorates', function (Blueprint $table) {
            $table->id();

            $table->string('directorate_name');
            $table->integer('status');
            // clé étrangère
            $table->unsignedBigInteger('academy_id');
            //contrainte sur la clé
            $table->foreign('academy_id')->references('id')->on('academies')->onDelete('cascade');
           //par convention 
          //  $table->foreignId('category_id')->constrained();

          $table->foreignId('user_id')->constrained()->onDelete('cascade');


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
        Schema::dropIfExists('directorates');
    }
};
