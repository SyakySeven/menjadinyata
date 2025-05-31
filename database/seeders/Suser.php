<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Suser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		User::truncate();

        $users = [
            [
				'username'=>'admin',
				'name'=>'Administrator',
				'email'=>'admin@gmail.com',
				'level'=>'admin',
				'password'=>Hash::make('123456')
			],
			[
				'username'=>'user1',
				'name'=>'Akun User1',
				'email'=>'user1@gmail.com',
				'level'=>'user',
				'password'=>Hash::make('123456')
			],
			[
				'username'=>'user2',
				'name'=>'Akun User2',
				'email'=>'user2@gmail.com',
				'level'=>'user',
				'password'=>Hash::make('123456')
			],
			[
				'username'=>'suplier1',
				'name'=>'Penyuplai Handal',
				'email'=>'suplier1@gmail.com',
				'level'=>'suplier',
				'password'=>Hash::make('123456')
			],
		];

		foreach ($users as $key => $value) {
			User::create($value);
		}
    }
}
