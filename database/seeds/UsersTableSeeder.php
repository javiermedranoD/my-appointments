<?php

use Illuminate\Database\Seeder;
Use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        User::create([
            'name' => 'Javier Medrano',
            'email' => 'javierlmedrano@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('840201'), // secret
            'identificacion' => '88270603',
            'address' => '',
            'phone' => '',
            'role' => 'admin'
        ]);

        factory(App\User::class, 50)->create();
    }
    
}
