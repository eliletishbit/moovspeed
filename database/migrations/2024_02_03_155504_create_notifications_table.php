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
        Schema::create('notifications', function (Blueprint $table) {
            // $table->id();
            $table->uuid('id')->primary(); 
            $table->string('type');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            // Nouveaux champs pour la relation polymorphique
            $table->unsignedBigInteger('notifiable_id');
            $table->string('notifiable_type');
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('demande_id')->nullable();
            
            
            

            // Contraintes de clés étrangères
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');            
            $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
