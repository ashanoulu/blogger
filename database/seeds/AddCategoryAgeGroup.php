<?php

use Illuminate\Database\Seeder;

class AddCategoryAgeGroup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_age_group')->insert(
            [
                [
                    'category_id'=> 3,
                    'age_group_id'=>2,
                ],
                [
                    'category_id'=> 1,
                    'age_group_id'=>1,
                ],
                [
                    'category_id'=> 1,
                    'age_group_id'=>3,
                ],
                [
                    'category_id'=> 1,
                    'age_group_id'=>4,
                ],
                [
                    'category_id'=> 2,
                    'age_group_id'=>4,
                ],
                [
                    'category_id'=> 4,
                    'age_group_id'=>4,
                ],

            ]
        );
    }
}
