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
        foreach ($boolpresses as $boolpress) {
            $tagRandom = Tag::inRandomOrder()->first()->id;
            $boolpress->tags()->attach($tagRandom);

            foreach ($tags as $tag) {
                $rand =random_int(0,4);
                if((bool) $rand) {
                    if($tagRandom != $boolpress->id) {
                        $boolpress->tags()->attach($boolpress->id);
                    }
                }
            }
        }
    }
}
