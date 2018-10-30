<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$password=bcrypt('test123');
        User::create([
        	'name'=>'Anudeep',
        	'email'=>'anudeep@gmail.com',
        	'password'=>$password,
            'role'=>'admin'
        ]);
        User::create([
            'name'=>'Anudeep1',
            'email'=>'anudeep1@gmail.com',
            'password'=>$password,
            'role'=>'employee'
        ]);
        User::create([
            'name'=>'Anudeep2',
            'email'=>'anudeep2@gmail.com',
            'password'=>$password,
            'role'=>'employee'
        ]);
        User::create([
            'name'=>'Anudeep3',
            'email'=>'anudeep3@gmail.com',
            'password'=>$password,
            'role'=>'employee'
        ]);
        User::create([
            'name'=>'Anudeep4',
            'email'=>'anudeep4@gmail.com',
            'password'=>$password,
            'role'=>'admin'
        ]);
    }
}
