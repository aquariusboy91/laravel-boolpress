<?php
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Model\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newCategory = new Boolpress();
            $newCategory = $faker->words(2,true);
            $title = "$newCategory->title->$i";
            $newCategory->slug = Str::slug($title, '-');
            $newCategory->save();
            
        }
    }
}
