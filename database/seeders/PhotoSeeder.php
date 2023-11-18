<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $images[] = ['file_name' => '01.jpg', 'file_type' => 'images/jpg', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '02.jpg', 'file_type' => 'images/jpg', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '03.jpg', 'file_type' => 'images/jpg', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '04.jpg', 'file_type' => 'images/jpg', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '05.jpg', 'file_type' => 'images/jpg', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '06.jpg', 'file_type' => 'images/jpg', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '07.jpg', 'file_type' => 'images/jpg', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '08.jpg', 'file_type' => 'images/jpg', 'file_size' => rand(100, 900), 'file_status' => true];
    
            // get all products from product table each product use $images arrays
            // each product use media() function from Product Model then 
            // create more than one to db between one or two image
            ProductCategory::all()->each(function ($productCategory) use ($images) {
                $productCategory->photo()->createMany(Arr::random($images, rand(1, 1)));
            });

            //product photo faker 
            Product::all()->each(function ($product) use ($images) {
                $product->photos()->createMany(Arr::random($images, rand(2, 3)));
            });


            //slider photo faker 
            Slider::all()->each(function ($slider) use ($images) {
                $slider->photos()->createMany(Arr::random($images, rand(2, 3)));
            });
        }
    }
}
