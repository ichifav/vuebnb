<?php

use App\User;
use App\Listing;
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
        $user = User::create([
            'email' => 'test@gmail.com',
            'password' => Hash::make('test'),
        ]);

        Listing::all()->each(function ($listing) use ($user) {
            if (mt_rand(1, 10) <= 3) {
                $user->save_listing($listing);
            }
        });
    }
}
