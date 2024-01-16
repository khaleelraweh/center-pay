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
     
        Currency::create(['currency_name'=>'الريال السعودي' , 'slug' =>$faker->unique()->slug(2,3), 'currency_symbol' =>'س ر' , 'currency_code'=>'SAR' , 'exchange_rate' => 1 , 'status'=> true ]);
        Currency::create(['currency_name'=>'ريال يمني' , 'slug' =>$faker->unique()->slug(2,3), 'currency_symbol' =>'ر ي;' , 'currency_code'=>'YER' , 'exchange_rate' => 139 , 'status'=> true ]);

    }
}
