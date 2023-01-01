<?php

use Illuminate\Database\Seeder;

class AddCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'name'=> 'Education',
                    'description'=>'Education',
                ],
                [
                    'name'=> 'Movie',
                    'description'=>'Movies',
                ],
                [
                    'name'=> '18+',
                    'description'=>'18+ category',
                ],
                [
                    'name'=> 'Documentary',
                    'description'=>'description',
                ],
            ]
        );
    }
}
