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

        // $detailer1 = App\User::create([

        // 	'name'          => 'Salman Iqbal',
        // 	'email' 	    => 'salman@gmail.com',
        // 	'phone_number'  => '04898900890',
        // 	'api_token' 	=> str_random(60),
        //     'user_type'     => 'detailer',
        //     'latitude'      => 78.99,
        // 	'longitude' 	=> 78.96,
        // 	'password' 		=> bcrypt('salman123'),
        // ]);

        // $detailer2 = App\User::create([

        //     'name'          => 'Mubbasir Hayat',
        //     'email'         => 'mubbasir@gmail.com',
        //     'phone_number'  => '9879798',
        //     'api_token'     => str_random(60),
        //     'user_type'     => 'detailer',
        //     'latitude'      => 77.99,
        //     'longitude'     => 77.96,
        //     'password'      => bcrypt('salman123'),
        // ]);

        // $detailer3 = App\User::create([

        //     'name'          => 'Kashif Taj',
        //     'email'         => 'kashif_taj@gmail.com',
        //     'phone_number'  => '09808080',
        //     'api_token'     => str_random(60),
        //     'user_type'     => 'detailer',
        //     'latitude'      => 76.99,
        //     'longitude'     => 76.96,
        //     'password'      => bcrypt('salman123'),
        // ]);

        // App\User::create([

        //     'name'          => 'Alludin Yousafzai',
        //     'email'         => 'Alludin@gmail.com',
        //     'phone_number'  => '0809809809',
        //     'api_token'     => str_random(60),
        //     'user_type'     => 'detailer',
        //     'latitude'      => 78.92,
        //     'longitude'     => 78.91,
        //     'password'      => bcrypt('salman123'),
        // ]);

        // App\User::create([

        //     'name'          => 'Adam Noor',
        //     'email'         => 'adam@gmail.com',
        //     'phone_number'  => '987987987',
        //     'api_token'     => str_random(60),
        //     'user_type'     => 'detailer',
        //     'latitude'      => 78.94,
        //     'longitude'     => 78.93,
        //     'password'      => bcrypt('salman123'),
        // ]);
    }
}
