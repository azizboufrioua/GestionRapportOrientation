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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

                $table->string('service_name');
                $table->string('logo');
                     // clé étrangère
                $table->foreignId('academy_id')->constrained()->onDelete('cascade');
                // clé étrangère
                $table->foreignId('directorate_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('settings');
    }
};
