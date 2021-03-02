<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'super-admin',
                'email' => 'sadmin'.rand().'@gmail.com',
                'email_verified_at' => Carbon::now(),
                'status' => STATUS['active'],
                'password' => Hash::make('afraz123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Student 1',
                'email' => 'student1'.rand().'@gmail.com',
                'email_verified_at' => Carbon::now(),
                'status' => STATUS['active'],
                'password' => Hash::make('afraz123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Student 2',
                'email' => 'student2'.rand().'@gmail.com',
                'email_verified_at' => Carbon::now(),
                'status' => STATUS['active'],
                'password' => Hash::make('afraz123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Teacher 1',
                'email' => 'teacher1'.rand().'@gmail.com',
                'email_verified_at' => Carbon::now(),
                'status' => STATUS['active'],
                'password' => Hash::make('afraz123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Teacher 2',
                'email' => 'teacher2'.rand().'@gmail.com',
                'email_verified_at' => Carbon::now(),
                'status' => STATUS['active'],
                'password' => Hash::make('afraz123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'admin',
                'email' => 'admin'.rand().'@gmail.com',
                'email_verified_at' => Carbon::now(),
                'status' => STATUS['active'],
                'password' => Hash::make('afraz123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        User::insert($data);
    }
}
