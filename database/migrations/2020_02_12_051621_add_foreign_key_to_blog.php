<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable(true);
            $table->unsignedBigInteger('age_group_id')->nullable(true);
            $table->unsignedBigInteger('created_by')->nullable(true);
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('age_group_id')->references('id')->on('age_groups');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign('blogs_age_group_id_foreign');
            $table->dropForeign('blogs_category_id_foreign');
            $table->dropForeign('blogs_created_by_foreign');
            $table->dropColumn('age_group_id');
            $table->dropColumn('category_id');
            $table->dropColumn('created_by');
        });
    }
}
