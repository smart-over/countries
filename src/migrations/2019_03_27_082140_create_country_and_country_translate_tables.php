<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCountryAndCountryTranslateTables
 */
class CreateCountryAndCountryTranslateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('countries', function (Blueprint $table) {

            $table->integer('id')->unique()->unsigned();
            $table->string('name', 191)->nullable(false);
            $table->string('alpha2Code', 191)->nullable(true);
            $table->string('alpha3Code', 191)->nullable(true);
            $table->string('region', 191)->nullable(true);
            $table->string('subregion', 191)->nullable(true);
            $table->string('timezone', 191)->nullable(true);
            $table->string('nativeName', 191)->nullable(true);
            $table->string('numericCode', 3)->nullable(true);
            $table->boolean('isDeleted')->nullable(false)->default(0);

            $table->index(['id', 'isDeleted'], 'countries_index_74439948577743');

        });

        Schema::create('countryTranslates', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->integer('countryId')->unsigned();
            $table->string('langCode');
            $table->string('translateName')->nullable(true);

            $table->index(['countryId', 'langCode'], 'country_translates_index_449300594');
            $table->foreign('countryId', 'country_translates_foreign_660499382851')
                ->references('id')->on('countries')->onDelete('cascade');

        });
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
