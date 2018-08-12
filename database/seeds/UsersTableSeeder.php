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

            'name'          => 'Admin',
            'email'         => 'admin@admin.com',
            'phone_number'  => '00000000000',
            'api_token'     => str_random(60),
            'user_type'     => 'admin',
            'latitude'      => 78.99,
            'longitude'     => 78.96,
            'password'      => bcrypt('admin'),
        ]);

        $detailer1 = App\User::create([

        	'name'          => 'Salman Iqbal',
        	'email' 	    => 'salman@gmail.com',
        	'phone_number'  => '04898900890',
        	'api_token' 	=> str_random(60),
            'user_type'     => 'detailer',
            'latitude'      => 78.99,
        	'longitude' 	=> 78.96,
        	'password' 		=> bcrypt('salman123'),
        ]);

        $detailer2 = App\User::create([

            'name'          => 'Mubbasir Hayat',
            'email'         => 'mubbasir@gmail.com',
            'phone_number'  => '9879798',
            'api_token'     => str_random(60),
            'user_type'     => 'detailer',
            'latitude'      => 77.99,
            'longitude'     => 77.96,
            'password'      => bcrypt('salman123'),
        ]);

        $detailer3 = App\User::create([

            'name'          => 'Kashif Taj',
            'email'         => 'kashif_taj@gmail.com',
            'phone_number'  => '09808080',
            'api_token'     => str_random(60),
            'user_type'     => 'detailer',
            'latitude'      => 76.99,
            'longitude'     => 76.96,
            'password'      => bcrypt('salman123'),
        ]);

        App\User::create([

            'name'          => 'Alludin Yousafzai',
            'email'         => 'Alludin@gmail.com',
            'phone_number'  => '0809809809',
            'api_token'     => str_random(60),
            'user_type'     => 'detailer',
            'latitude'      => 78.92,
            'longitude'     => 78.91,
            'password'      => bcrypt('salman123'),
        ]);

        App\User::create([

            'name'          => 'Adam Noor',
            'email'         => 'adam@gmail.com',
            'phone_number'  => '987987987',
            'api_token'     => str_random(60),
            'user_type'     => 'detailer',
            'latitude'      => 78.94,
            'longitude'     => 78.93,
            'password'      => bcrypt('salman123'),
        ]);

        /* subscription data start */

        DB::table('subscriptions')->insert([

            'detailer_id'               => $detailer1->id,
            'remaining_subscriptions'   => 0,
            'detailer_subscriptions'    => 200,
            'used_subscriptions'          => 0,
            'created_at'     => \Carbon\Carbon::now(),
            'updated_at'     => \Carbon\Carbon::now(),
        ]);

        DB::table('subscriptions')->insert([

            'detailer_id'               => $detailer2->id,
            'remaining_subscriptions'   => 0,
            'detailer_subscriptions'    => 100,
            'used_subscriptions'          => 0,
            'created_at'     => \Carbon\Carbon::now(),
            'updated_at'     => \Carbon\Carbon::now(),
        ]);

        DB::table('subscriptions')->insert([

            'detailer_id'               => $detailer3->id,
            'remaining_subscriptions'   => 0,
            'used_subscriptions'          => 0,
            'detailer_subscriptions'    => 300,
            'created_at'     => \Carbon\Carbon::now(),
            'updated_at'     => \Carbon\Carbon::now(),
        ]);

        /*customer data start*/

        App\User::create([

        	'name' => 'bilal Sabir',
        	'email' => 'bilal@gmail.com',
        	'warranty_code' => 'abc123',
        	'phone_number' => '80808098',
        	'api_token' => str_random(60),
        	'user_type' => 'customer',
        	'password' => bcrypt('bilal123'),

        ]);

        App\User::create([

            'name' => 'Taroo Jaba',
            'email' => 'taroo@gmail.com',
            'warranty_code' => 'abc124',
            'phone_number' => '987897897',
            'api_token' => str_random(60),
            'user_type' => 'customer',
            'password' => bcrypt('bilal123'),

        ]);

        App\User::create([

            'name' => 'Marina Khan',
            'email' => 'marina@gmail.com',
            'warranty_code' => 'abc125',
            'phone_number' => '98798789',
            'api_token' => str_random(60),
            'user_type' => 'customer',
            'password' => bcrypt('bilal123'),

        ]);
    }
}
