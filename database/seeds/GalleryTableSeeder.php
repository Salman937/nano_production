<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gallery')->insert([
        	[
	        	'title'  	  => 'New Cars in India',
	        	'image'  	  => 'uploads/gallery_images/g1.jpg',
	        	'created_at'  => \Carbon\Carbon::now(),
    			'updated_at'  => \Carbon\Carbon::now(),
        	],
        	[
	        	'title'		  => 'Tesla Autopilot Trouble',
	        	'image' 	  => 'uploads/gallery_images/g2.jpg',
	        	'created_at'  => \Carbon\Carbon::now(),
    			'updated_at'  => \Carbon\Carbon::now(),
        	],
        	[
	        	'title' 	  => 'Flying Cars Take Off',
	        	'image' 	  => 'uploads/gallery_images/g3.jpg',
	        	'created_at'  => \Carbon\Carbon::now(),
    			'updated_at'  => \Carbon\Carbon::now(),
        	]
        ]);
    }
}
