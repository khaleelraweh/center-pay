<?php

namespace Database\Seeders;

use App\Models\WebMenu;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $menus = WebMenu::create(['name_ar' => 'الرئيسية'    ,   'name_en' => 'Main'   ,  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => null]);
        WebMenu::create(['name_ar' => 'شدات بوبجي المتجر السعودي'    ,   'name_en' => 'PUBG Wrenches Saudi Store'   ,  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $menus->id]);
        WebMenu::create(['name_ar' => 'شدات بوبجي المتجر البريطاني'    ,   'name_en' => 'PUBG Wrenches British Store'   ,  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $menus->id]);
        WebMenu::create(['name_ar' => 'شدات بوبجي المتجر الامريكي'    ,   'name_en' => 'PUBG Wrenches American Store'   ,  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $menus->id]);
        $menus = WebMenu::create(['name_ar' => 'بطاقة ايتونز'    ,   'name_en' => 'iTunes cards'   ,  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => null]);


    }
}