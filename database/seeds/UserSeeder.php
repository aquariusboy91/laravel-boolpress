<?php
use Faker\Generator as Faker;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $newUser = new User();
            $newUser->name = $faker->name();
            $newUser->email = $faker->email();

            //creo una stringa da usare per accedere come passeword
            $string = '123_FC76';
            //la cripto per salvarla in db
            $newUser->password = Hash::make($string);
            $newUser->save();
        }
    }
}
