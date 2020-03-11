<?php

use Illuminate\Database\Seeder;

class Product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([ 
            'name' => 'Cake',
            'price' => 100,
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime temporibus quia blanditiis dolore, vitae veritatis minus expedita. Ipsam, incidunt debitis.',
            'image' => 'images/products/1581072675.png',
            'type' => 1,
        ]); 
        DB::table('products')->insert([ 
            'name' => 'Puffs',
            'price' => 40,
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime temporibus quia blanditiis dolore, vitae veritatis minus expedita. Ipsam, incidunt debitis.',
            'image' => 'images/products/1581072871.png',
            'type' => 2,
        ]); 
        DB::table('products')->insert([ 
            'name' => 'Juice',
            'price' => 20,
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime temporibus quia blanditiis dolore, vitae veritatis minus expedita. Ipsam, incidunt debitis.',
            'image' => 'images/products/1581080547.png',
            'type' => 1,
        ]); 
        DB::table('products')->insert([ 
            'name' => 'Roti',
            'price' => 30,
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime temporibus quia blanditiis dolore, vitae veritatis minus expedita. Ipsam, incidunt debitis.',
            'image' => 'images/products/it_quiz.png',
            'type' => 1,
        ]); 
        DB::table('products')->insert([ 
            'name' => 'Naan',
            'price' => 40,
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime temporibus quia blanditiis dolore, vitae veritatis minus expedita. Ipsam, incidunt debitis.',
            'image' => 'images/products/coding.png',
            'type' => 1,
        ]); 
        DB::table('products')->insert([ 
            'name' => 'Butter Masala',
            'price' => 200,
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime temporibus quia blanditiis dolore, vitae veritatis minus expedita. Ipsam, incidunt debitis.',
            'image' => 'images/products/cosplay.png',
            'type' => 1,
        ]); 
        DB::table('products')->insert([ 
            'name' => 'Jelabi',
            'price' => 20,
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime temporibus quia blanditiis dolore, vitae veritatis minus expedita. Ipsam, incidunt debitis.',
            'image' => 'images/products/gaming.png',
            'type' => 1,
        ]); 
        DB::table('products')->insert([ 
            'name' => 'Mutton',
            'price' => 40,
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime temporibus quia blanditiis dolore, vitae veritatis minus expedita. Ipsam, incidunt debitis.',
            'image' => 'images/products/vlog.png',
            'type' => 1,
        ]); 
        DB::table('products')->insert([ 
            'name' => 'Chicken',
            'price' => 100,
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime temporibus quia blanditiis dolore, vitae veritatis minus expedita. Ipsam, incidunt debitis.',
            'image' => 'images/products/mad_ad.png',
            'type' => 1,
        ]); 
        DB::table('products')->insert([ 
            'name' => 'Laddu',
            'price' => 40,
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime temporibus quia blanditiis dolore, vitae veritatis minus expedita. Ipsam, incidunt debitis.',
            'image' => 'images/products/web_design.png',
            'type' => 1,
        ]); 

    }
}
