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
        Schema::create('utilisateurs', function (Blueprint $table) {
                        $table->id();
                        $table->string('FirstName');
                        $table->string('LastName');
                        $table->string('Username')->unique();
                        $table->string('Phone'); // Changement en string
                        $table->string('email')->unique();
                        $table->string('password');
                        $table->unsignedBigInteger('company_id')->nullable(); // Nullable
                        $table->timestamps(); // Ajout de timestamps
                    });
                }
            
            
            
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
};
