<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueColumnToCategoryAgeGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_age_group', function (Blueprint $table) {
//            $table->dropPrimary('category_age_group_age_group_id_category_id');
            $table->bigIncrements('id');
            $table->unique(['age_group_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_age_group', function (Blueprint $table) {

        });
    }
}
