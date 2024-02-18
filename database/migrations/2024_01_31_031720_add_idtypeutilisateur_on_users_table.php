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
        Schema::table('users', function (Blueprint $table) {
            //rajout attributs de clés etrangères
            $table->unsignedBigInteger('idtypeutilisateur')->nullable()->default(null);

            //definition des contraintes relationnelles
            $table->foreign('idtypeutilisateur')->references('id')->on('typeutilisateurs')->onDelete('set null');
            
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
        Schema::table('users', function (Blueprint $table) {
            //en cas derollback
            Schema::disableForeignKeyConstraints();
            $table->dropForeign('idtypeutilisateur');
        });
    }
};
