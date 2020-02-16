<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt('password');
        
        User::create([
            'name' => 'Chris',
            'email' => 'chris@app.com',
            'password' => $password,
        ]);
    }
}
