<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryAndCountryTranslateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('country', function (Blueprint $table) {
            $table->integer('id')->unique()->unsigned()->zerofill();
            $table->string('name', 191)->nullable(false);
            $table->string('alpha2Code', 191)->nullable(true);
            $table->string('alpha3Code', 191)->nullable(true);
            $table->string('region', 191)->nullable(true);
            $table->string('subregion', 191)->nullable(true);
            $table->string('timezone', 191)->nullable(true);
            $table->string('nativeName', 191)->nullable(true);
            $table->integer('numericCode')->unsigned()->nullable(true);
            $table->boolean('isDeleted')->nullable(false)->default(0);

            $table->index('id', 'id_index');
            $table->index('name', 'name_index');
            $table->index(['id', 'name'], 'id_name_index');
        });

        \Illuminate\Support\Facades\DB::statement('ALTER TABLE country CHANGE id id INT(3) UNSIGNED ZEROFILL NOT NULL');
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE country CHANGE numericCode numericCode INT(3) UNSIGNED ZEROFILL NOT NULL');

        Schema::create('countryTranslate', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('countryId')->unsigned()->zerofill();
            $table->string('langCode');
            $table->string('translateName')->nullable(true);

            $table->index(['countryId', 'langCode'], 'country_id_and_lang_code_index');
            $table->foreign('countryId', 'country_id_foreign')->references('id')->on('country')->onDelete('cascade');

        });

        \Illuminate\Support\Facades\DB::statement('ALTER TABLE countryTranslate CHANGE countryId countryId INT(3) UNSIGNED ZEROFILL NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('countryTranslate');
        Schema::drop('country');

    }
}
