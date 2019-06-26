<?php

use Illuminate\Database\Seeder;
use App\User;

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
          'name' => 'Admin Admin',
          'email' => 'admin@email.com',
          'password' => bcrypt('admin123'),
      ]);
    }
}
