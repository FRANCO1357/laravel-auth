<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'FRANCO1357';
        $user->email = 'f@gmail.com';
        $user->password = bcrypt('cavolo');
        $user->save();
    }
}
