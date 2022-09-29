<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();
        $user->name = 'FRANCO1357';
        $user->email = 'f@gmail.com';
        $user->password = bcrypt('cavolo');
        $user->save();

        for($i = 0; $i < 9; $i++){
            $user = new User();
            $user->name = $faker->userName();
            $user->email = $faker->email();
            $user->password = bcrypt('cavolo');
            $user->save();
        }
    }
}
