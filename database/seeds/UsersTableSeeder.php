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
        $user = new User;
        $user->name = "Admin";
        $user->email = "admin@kopiqu.com";
        $user->password = bcrypt('admin');
        $user->is_admin = true;
        $user->save();
    }
}
