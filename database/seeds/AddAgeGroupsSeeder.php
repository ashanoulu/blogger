<?php

use Illuminate\Database\Seeder;

class AddAgeGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('age_groups')->insert(
            [
                [
                    'name'=> 'Children 1-5',
                    'description'=>'Education',
                ],
                [
                    'name'=> '18+',
                    'description'=>'18',
                ],
                [
                    'name'=> 'Teenagers',
                    'description'=>'Teen',
                ],
                [
                    'name'=> 'Elder',
                    'description'=>'Elder',
                ],
                [
                    'name'=> 'All',
                    'description'=>'All',
                ],
            ]
        );
    }
}
