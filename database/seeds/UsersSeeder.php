<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0, 15) as $number):
            $user = new \App\User();
            $user->name = str_random(10);
            $user->email = str_random(10) . '@gmail.com';
            $user->password = bcrypt('321321');
            $user->save();
        endforeach;

        $user = new \App\User();
        $user->name = 'Yuriy';
        $user->email = 'gr.a.venom@gmail.com';
        $user->password = bcrypt('321321');
        $user->save();
    }
}
