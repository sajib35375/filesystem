<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Munira',
            'email' => 'munira@gmail.com',
            'password' => Hash::make('user123456')
        ]);

        Admin::create([
            'name' => 'Sajib',
            'email' => 'sajib@gmail.com',
            'password' => Hash::make('admin123456')
        ]);

        Community::create([
            'title' => 'This is demo title for Community post ',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe nam, quae laboriosam impedit sapiente nisi. Praesentium non possimus enim voluptatem.',
            'status' => true,
            'views' => 25,
            'user_id' => 1
        ]);


    }
}
