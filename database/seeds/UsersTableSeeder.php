<?php

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
        App\User::create([

        	'name'          => 'Salman Iqbal',
        	'email' 	    => 'salman@gmail.com',
        	'phone_number'  => '04898900890',
        	'api_token' 	=> str_random(60),
            'user_type'     => 'detailer',
            'latitude'      => 78.99,
        	'longitude' 	=> 78.96,
        	'password' 		=> bcrypt('salman123'),
        ]);


        App\User::create([

        	'name' => 'bilal Sabir',
        	'email' => 'bilal@gmail.com',
        	'warranty_code' => 'abc123',
        	'phone_number' => '80808098',
        	'api_token' => str_random(60),
        	'user_type' => 'customer',
        	'password' => bcrypt('bilal123'),

        ]);
    }
}
