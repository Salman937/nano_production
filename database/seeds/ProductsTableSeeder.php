<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('products')->insert([
    	  [
    		'title' 		 => 'PRO9H',
    		'edition'   	 => 'Titanum Eidition',
    		'features' 	 	 => 'Scratch Resistance,Antioxidant,Anti Static,Feature 4',
    		'image'     	 => 'uploads/product_images/product.jpg',
    		'technical_data' => 'Appearance: Clear High Gloss,Specific Gravity @ 23C: 0.92 g/cm3, VISCOSIY @ 23C: 7.0CP,Bla bla',
    		'information'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    		'use'            => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    		'safety'         => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    		'created_at'     => \Carbon\Carbon::now(),
    		'updated_at'     => \Carbon\Carbon::now(),
    	  ],

    	  [
    		'title' 		 => 'Product2',
    		'edition'   	 => 'Dummy Edition',
    		'features' 	 	 => 'Scratch Resistance,Antioxidant,Anti Static,Feature 4',
    		'image'     	 => 'uploads/product_images/product1.jpg',
    		'technical_data' => 'Appearance: Clear High Gloss,Specific Gravity @ 23C: 0.92 g/cm3, VISCOSIY @ 23C: 7.0CP,Bla bla',
    		'information'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    		'use'            => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    		'safety'         => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    		'created_at'     => \Carbon\Carbon::now(),
    		'updated_at'     => \Carbon\Carbon::now(),
    	  ],

    	  [
    		'title' 		 => 'Product3',
    		'edition'   	 => 'Product3 Eidition',
    		'features' 	 	 => 'Scratch Resistance,Antioxidant,Anti Static,Feature 4',
    		'image'     	 => 'uploads/product_images/product2.jpg',
    		'technical_data' => 'Appearance: Clear High Gloss,Specific Gravity @ 23C: 0.92 g/cm3, VISCOSIY @ 23C: 7.0CP,Bla bla',
    		'information'    => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    		'use'            => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    		'safety'         => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    		'created_at'     => \Carbon\Carbon::now(),
    		'updated_at'     => \Carbon\Carbon::now(),
    	  ]
    	]);
    }
}
