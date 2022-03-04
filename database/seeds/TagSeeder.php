<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayTags = [
            'Animal',
            'Technology',
            'Science',
            'Geography',
            'Math'
        ];

        foreach ($arrayTags as $tag) {
            $newTag = new Tag();
            $newTag -> name = $tag;
            $newTag -> save();

        }
    }
}
