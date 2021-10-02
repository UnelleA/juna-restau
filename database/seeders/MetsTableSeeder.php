<?php
namespace Database\Seeders;
use App\Models\met as met;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= \Faker\Factory::create();
        for ($i=0; $i <100; $i++) {
        met::create([
                  'title'=>$faker->sentence(4),
                  'description'=>$faker->text,
                  'price'=>$faker->numberBetween(15,300)*100,
                  'image'=>'1.png',
                  'category_id'=>$faker->sentence(4),




           ]);
        }
    }
}
