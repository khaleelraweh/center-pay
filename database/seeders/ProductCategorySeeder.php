<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colthes = ProductCategory::create(['name' => 'Clothes'     , 'cover' => 'colthes.jpg' , 'status' => true , 'parent_id' => null]);
        ProductCategory::create(['name' => 'Women\'s T-shirts'      , 'cover' => 'colthes.jpg' , 'status' => true , 'parent_id' => $colthes->id]);
        ProductCategory::create(['name' => 'Men\'s T-shirts'        , 'cover' => 'colthes.jpg' , 'status' => true , 'parent_id' => $colthes->id]);
        ProductCategory::create(['name' => 'Dresses\'s T-shirts'    , 'cover' => 'colthes.jpg' , 'status' => true , 'parent_id' => $colthes->id]);
        ProductCategory::create(['name' => 'Novelty Socks T-shirts' , 'cover' => 'colthes.jpg' , 'status' => true , 'parent_id' => $colthes->id]);
        ProductCategory::create(['name' => 'Women\'s Sunglasses'    , 'cover' => 'colthes.jpg' , 'status' => true , 'parent_id' => $colthes->id]);
        ProductCategory::create(['name' => 'Men\'s Sunglasses'      , 'cover' => 'colthes.jpg' , 'status' => true , 'parent_id' => $colthes->id]);


        $shose = ProductCategory::create(['name' => 'Shoes' , 'cover' => 'shose.jpg' , 'status' => true , 'parent_id' => null]);
        ProductCategory::create(['name' => 'Women\'s shose' , 'cover' => 'shose.jpg' , 'status' => true , 'parent_id' => $shose->id]);
        ProductCategory::create(['name' => 'Men\'s shose'   , 'cover' => 'shose.jpg' , 'status' => true , 'parent_id' => $shose->id]);
        ProductCategory::create(['name' => 'Boy\'s shose'   , 'cover' => 'shose.jpg' , 'status' => true , 'parent_id' => $shose->id]);
        ProductCategory::create(['name' => 'Girls\'s shose' , 'cover' => 'shose.jpg' , 'status' => true , 'parent_id' => $shose->id]);

        $watches = ProductCategory::create(['name' => 'Watches' , 'cover' => 'watches.jpg' , 'status' => true , 'parent_id' => null]);
        ProductCategory::create(['name' => 'Women\'s watches'   , 'cover' => 'watches.jpg' , 'status' => true , 'parent_id' => $watches->id]);
        ProductCategory::create(['name' => 'Men\'s watches'     , 'cover' => 'watches.jpg' , 'status' => true , 'parent_id' => $watches->id]);
        ProductCategory::create(['name' => 'Boy\'s watches'     , 'cover' => 'watches.jpg' , 'status' => true , 'parent_id' => $watches->id]);
        ProductCategory::create(['name' => 'Girls\'s watches'   , 'cover' => 'watches.jpg' , 'status' => true , 'parent_id' => $watches->id]);

        $electronies = ProductCategory::create(['name' => 'Electronies' , 'cover' => 'electronies.jpg' , 'status' => true , 'parent_id' => null]);
        ProductCategory::create(['name' => 'Women\'s electronies'       , 'cover' => 'electronies.jpg' , 'status' => true , 'parent_id' => $electronies->id]);
        ProductCategory::create(['name' => 'Men\'s electronies'         , 'cover' => 'electronies.jpg' , 'status' => true , 'parent_id' => $electronies->id]);
        ProductCategory::create(['name' => 'Boy\'s electronies'         , 'cover' => 'electronies.jpg' , 'status' => true , 'parent_id' => $electronies->id]);
        ProductCategory::create(['name' => 'Girls\'s electronies'       , 'cover' => 'electronies.jpg' , 'status' => true , 'parent_id' => $electronies->id]);

    }
}
