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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('activity_subject');
            $table->longText('activity_description')->nullable();
			
			 $table->string('year');
			 $table->string('month');
			 $table->string('day');

            $table->string('activity_classes')->default('-');;
            $table->integer('activity_effectif')->default(0);;
            $table->string('activity_contributor')->nullable();
			
        

            $table->longText('activity_constraint')->nullable();
            
            // clé étrangère
            $table->unsignedBigInteger('school_id');
            //contrainte sur la clé
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');

             // clé étrangère
             $table->unsignedBigInteger('axe_id');
             //contrainte sur la clé
             $table->foreign('axe_id')->references('id')->on('axes')->onDelete('cascade');

            // clé étrangère
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
        Schema::dropIfExists('activities');
    }
};
