<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = User::create([
            'name' => 'Jeff Cote',
            'email' => 'hello@jeffcote.me',
            'password' => bcrypt('01020304'),
        ]);


        $user = User::create([
            'name' => 'Leonardo Escobar',
            'email' => 'pediatraleoescobar@gmail.com',
            'password' => bcrypt('01020304'),
        ]);

        $user->assignRole('Administrador');
        
        $user = User::create([
            'name' => 'Rebeca Barrios',
            'email' => 'rebeca10barrios@hotmail.com',
            'password' => bcrypt('Rebeca10'),
        ]);

        $user = User::create([
            'name' => 'Anggie Moncada Pelaez',
            'email' => 'angiefda125@hotmail.com',
            'password' => bcrypt('3646787angie'),
        ]);

        //User::factory(25)->create();
    }
}
