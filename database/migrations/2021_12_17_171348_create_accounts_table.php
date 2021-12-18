<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();

            $table->string('imie')->nullable();
            $table->string('nazwisko')->nullable();
            $table->string('login')->unique();
            $table->string('haslo');
            $table->string('typ')->nullable();
            $table->string('telefon')->nullable();
            $table->string('wyksztalcenie')->nullable();
            $table->json('adres_z')->nullable();
            $table->json('adres_k')->nullable();

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
        Schema::dropIfExists('accounts');
    }
}
