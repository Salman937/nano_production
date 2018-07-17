<?php

use Illuminate\Database\Seeder;

class NewsFeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_feed')->insert([

        	[
        		'name' 	   => 'Alaxender',
        		'image'    => 'uploads/news_feed_images/image1.jpg',
        		'content'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'created_at'     => \Carbon\Carbon::now(),
                'updated_at'     => \Carbon\Carbon::now(),
        	],
        	[
        		'name' 	   => 'Gillcrest',
        		'image'    => 'uploads/news_feed_images/image1.jpg',
        		'content'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'created_at'     => \Carbon\Carbon::now(),
                'updated_at'     => \Carbon\Carbon::now(),
        	],
        	[
        		'name' 	   => 'Rafiullah',
        		'image'    => 'uploads/news_feed_images/image2.jpg',
        		'content'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'created_at'     => \Carbon\Carbon::now(),
                'updated_at'     => \Carbon\Carbon::now(),
        	]

        ]);
    }
}
