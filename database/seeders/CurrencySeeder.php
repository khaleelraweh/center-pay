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
        $faker = Factory::create();
     
        Currency::create(['currency_name'=>'دولار امريكي' , 'slug' =>$faker->unique()->slug(2,3), 'currency_symbol' =>'$' , 'currency_code'=>'USD' , 'exchange_rate' => 4.11 , 'status'=> true ]);
        Currency::create(['currency_name'=>'باوند بريطاني' , 'slug' =>$faker->unique()->slug(2,3), 'currency_symbol' =>'GP;' , 'currency_code'=>'GBP' , 'exchange_rate' => 3.11 , 'status'=> true ]);

    }
}
