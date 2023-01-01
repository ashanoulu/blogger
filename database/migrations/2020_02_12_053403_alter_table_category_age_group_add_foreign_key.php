<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCategoryAgeGroupAddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_age_group', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('age_group');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('age_group_id');
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
//            $table->dropColumn('category_id');
//            $table->dropColumn('age_group_id');
//            $table->bigInteger('category');
//            $table->bigInteger('age_group');
        });
    }
}
