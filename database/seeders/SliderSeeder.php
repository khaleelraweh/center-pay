<?php

namespace Database\Seeders;

use App\Models\Slider;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // توقف عن العمل لا ادري لماذا 
        $faker = Factory::create('ar_JO');
        $target = ['_self', '_blank'];

        $quots01['title'] = ['ar' => 'الرئيسية', 'en' => 'Main', 'ca' => 'Principal',];
        $quots01['content'] = ['ar' => 'بيانات عن الخدمات الرئيسية', 'en' => 'details about main service', 'ca' => 'Datos sobre los principales servicios',];
        $quots01['section'] = 1;
        $quots01['created_by'] = 'admin';
        $quots01['status'] = true;
        $quots01['published_on'] = $faker->dateTime();
        $main_slider =  Slider::create($quots01);

        // for ($i = 1; $i <= 5; $i++) {
        //     $faker = Factory::create('ar_JO');
        //     $target = ['_self', '_blank'];

        //     $quots01['title'] = ['ar' => 'fake data', 'en' => 'Main', 'ca' => 'Principal',];
        //     $quots01['content'] = ['ar' => 'بيانات عن الخدمات الرئيسية', 'en' => 'details about main service', 'ca' => 'Datos sobre los principales servicios',];
        //     $quots01['section'] = 1;
        //     $quots01['created_by'] = 'admin';
        //     $quots01['status'] = true;
        //     $quots01['published_on'] = $faker->dateTime();
        //     $main_slider =  Slider::create($quots01);
        // }

        // for ($i = 1; $i <= 3; $i++) {
        //     $faker = Factory::create('ar_JO');
        //     $target = ['_self', '_blank'];

        //     $quots01['title'] = ['ar' => 'اعلان', 'en' => 'Main', 'ca' => 'Principal',];
        //     $quots01['content'] = ['ar' => 'بيانات عن الخدمات الرئيسية', 'en' => 'details about main service', 'ca' => 'Datos sobre los principales servicios',];
        //     $quots01['section'] = 2;
        //     $quots01['created_by'] = 'admin';
        //     $quots01['status'] = true;
        //     $quots01['published_on'] = $faker->dateTime();
        //     $main_slider =  Slider::create($quots01);
        // }
    }
}
