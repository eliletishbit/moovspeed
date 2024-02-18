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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('lieudep');
            $table->string('lieudest');
            $table->datetime('dateHeureDem');
            $table->boolean('status');
            $table->timestamps();

            //cles etrangere idchauffeur
            $table->unsignedBigInteger('idchauffeur')->nullable()->default(null);

            //declaration contrainte sur idchauffeur
            $table->foreign('idchauffeur')->references('id')->on('users')->onDelete('set null');

            //autoriser la verif des contraintes de clé
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('demandes');
    }
};
