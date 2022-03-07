<?php
use App\Model\Boolpress;
use App\Model\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BoolpressTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boolpresses= Boolpress::all();
        $tags= Tag::all();
        
        foreach ($tags as $tag) {
      $boolpresses = Boolpress::inRandomOrder()->limit(6)->get();
      $tag->boolpress()->attach($boolpresses);
}
    }
}
