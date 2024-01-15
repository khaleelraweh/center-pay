<?php

namespace Database\Seeders;

use App\Models\Currency;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ar_JO');
        $currencyRecords = [
            ['id'=> 1 , 'currency_name' => 'دولار امريكي' , 'slug'=>$faker->unique()->slug() , 'currency_code' => 'USD' , 'exchange_rate' => 3.75 , 'created_at'=> now() , 'status' => 1],
            ['id'=> 2 , 'currency_name' => 'باوند بريطاني' , 'slug'=>$faker->unique()->slug() , 'currency_code' => 'GBP' , 'exchange_rate' => 4.77 , 'created_at'=> now() , 'status' => 1],
            ['id'=> 3 , 'currency_name' => 'يورو اوروبي' , 'slug'=>$faker->unique()->slug() , 'currency_code' => 'EUR' , 'exchange_rate' => 4.11 , 'created_at'=> now() , 'status' => 1],
            ['id'=> 4 , 'currency_name' => 'دولار استرالي' , 'slug'=>$faker->unique()->slug() , 'currency_code' => 'AUD' , 'exchange_rate' => 2.50 , 'created_at'=> now() , 'status' => 1],
        ];

        Currency::insert($currencyRecords);
    }
}
