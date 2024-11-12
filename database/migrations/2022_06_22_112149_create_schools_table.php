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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();

            $table->string('school_name');
            $table->integer('status');
            $table->integer('school_qual');
            $table->integer('school_coll');
            $table->string('school_classes');
            $table->string('school_effectif');
            // clé étrangère
            $table->unsignedBigInteger('district_id');
            //contrainte sur la clé
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');

             // clé étrangère
             $table->unsignedBigInteger('directorate_id');
             //contrainte sur la clé
             $table->foreign('directorate_id')->references('id')->on('directorates')->onDelete('cascade');


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
        Schema::dropIfExists('schools');
    }
};
