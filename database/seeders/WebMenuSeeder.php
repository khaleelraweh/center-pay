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


        // $main_menus = WebMenu::create(  ['name_ar'  =>   'الرئيسية'                     ,   'name_en' => 'Main'                        ,  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => null]);
        // WebMenu::create(                ['name_ar'  =>   'شدات بوبجي المتجر السعودي'   ,   'name_en' => 'PUBG Wrenches Saudi Store'   ,  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $main_menus->id]);
        // WebMenu::create(                ['name_ar'  =>   'شدات بوبجي المتجر البريطاني' ,   'name_en' => 'PUBG Wrenches British Store' ,  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $main_menus->id]);
        // WebMenu::create(                ['name_ar'  =>   'شدات بوبجي المتجر الامريكي'   ,   'name_en' => 'PUBG Wrenches American Store',  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $main_menus->id]);
        // $main_menus = WebMenu::create(  ['name_ar'  =>   'بطاقة ايتونز'                 ,   'name_en' => 'iTunes cards'                ,  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => null]);
        

        // $helps_menus = WebMenu::create(  ['name_ar'  =>   'كيف اقوم بالشراء'  ,   'name_en' => 'How do I purchase?'  , 'section'    => 2    ,  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => null]);
        // $helps_menus = WebMenu::create(  ['name_ar'  =>   'الشروط والاحكام ' ,   'name_en' => 'Terms and Conditions'  , 'section'   => 2   ,  'created_by' => 'admin'   ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => null]);
        

        // Main menu Items 
        $quots01['title'] = ['ar' => 'الرئيسية','en' => 'Main','ca' => 'MainI',];
        $quots01['created_by'] = 'admin';
        $quots01['status'] = true;
        $quots01['published_on'] = $faker->dateTime();
        $quots01['parent_id'] = null;
        $main_menus =  WebMenu::create($quots01);

        $quots02['title'] = ['ar' => 'شدات بوبجي المتجر السعودي','en' => 'PUBG Wrenches Saudi Store','ca' => 'PUBG Wrenches Saudi Store2',];
        $quots02['created_by'] = 'admin';
        $quots02['status'] = true;
        $quots02['published_on'] = $faker->dateTime();
        $quots02['parent_id'] = $main_menus->id;
        WebMenu::create($quots02);

        $quots03['title'] = ['ar' => 'شدات بوبجي المتجر البريطاني','en' => 'PUBG Wrenches British Store','ca' => 'PUBG Wrenches British Store2',];
        $quots03['created_by'] = 'admin';
        $quots03['status'] = true;
        $quots03['published_on'] = $faker->dateTime();
        $quots03['parent_id'] = $main_menus->id;
        WebMenu::create($quots03);

        $quots04['title'] = ['ar' => 'شدات بوبجي المتجر الامريكي','en' => 'PUBG Wrenches American Store','ca' => 'PUBG Wrenches American Store2',];
        $quots04['created_by'] = 'admin';
        $quots04['status'] = true;
        $quots04['published_on'] = $faker->dateTime();
        $quots04['parent_id'] = $main_menus->id;
        WebMenu::create($quots04);

        $quots05['title'] = ['ar' => 'بطاقة ايتونز','en' => 'iTunes cards','ca' => 'iTunes cardsI',];
        $quots05['created_by'] = 'admin';
        $quots05['status'] = true;
        $quots05['published_on'] = $faker->dateTime();
        $quots05['parent_id'] = null;
        $main_menus =  WebMenu::create($quots05);


        // helper menu items 
        $quots06['title'] = ['ar' => 'كيف اقوم بالشراء','en' => 'How do I purchase?','ca' => 'How do I purchase?I',];
        $quots06['section'] = 2;
        $quots06['created_by'] = 'admin';
        $quots06['status'] = true;
        $quots06['published_on'] = $faker->dateTime();
        $quots06['parent_id'] = null;
        $main_menus =  WebMenu::create($quots06);

        $quots07['title'] = ['ar' => 'الشروط والاحكام ','en' => 'Terms and Conditions','ca' => 'Terms and ConditionsI',];
        $quots07['section'] = 2;
        $quots07['created_by'] = 'admin';
        $quots07['status'] = true;
        $quots07['published_on'] = $faker->dateTime();
        $quots07['parent_id'] = null;
        $main_menus =  WebMenu::create($quots07);

        
      

    }
}