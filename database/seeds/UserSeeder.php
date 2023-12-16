<?php

use App\User as User;
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
        User::create([
            'name' => 'Joao Oliveira',
            'email' => 'djohnoliver@gmail.com',
            'password' => bcrypt(12345678),
        ]);
    }
}
