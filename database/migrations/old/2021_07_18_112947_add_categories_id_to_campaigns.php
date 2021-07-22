<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriesIdToCampaigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function(Blueprint $table){
            $table->integer('categories_id')->nullable()->after('slug')->unsigned();

            $table->foreign('categories_id')->reference('id')->on('categories')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('campaigns', function(Blueprint $table){
           //
        });
    }
}
