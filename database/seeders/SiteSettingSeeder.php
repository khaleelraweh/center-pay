<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        SiteSetting::create(['name'    =>  'site_name'   ,   'value' =>  'Center Pay'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_short_name'   ,   'value' =>  'CP'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_description'   ,   'value' =>  'This is description'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_link'   ,   'value' =>  'https://shop.mudhila.com/'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_img'   ,   'value' =>  '1.jpg'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);

        SiteSetting::create(['name'    =>  'site_address'   ,   'value' =>  'المملكة العربية السعودية'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_phone'   ,   'value' =>  '772036131'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_mobile'   ,   'value' =>  '436285'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_fax'   ,   'value' =>  'fx'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_po_box'   ,   'value' =>  '985'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_email1'   ,   'value' =>  'centerpay@gmail.com'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_email2'   ,   'value' =>  'centerpay2@gmail.com'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_workTime'   ,   'value' =>  'طوال ايام الاسبوع'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);

        SiteSetting::create(['name'    =>  'site_facebook'   ,   'value' =>  'centerpay.facebook.com'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_twitter'   ,   'value' =>  'Center.twitter.com'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_youtube'   ,   'value' =>  'Center.youtube.com'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_instegram'   ,   'value' =>  'Center.instegram.com'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);

        SiteSetting::create(['name'    =>  'site_name_meta'   ,   'value' =>  'Center Pay'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_description_meta'   ,   'value' =>  'Center Pay description'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_link_meta'   ,   'value' =>  'Center Pay links here'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_keywords_meta'   ,   'value' =>  'cards , products'    ,   'status'    =>  true  ,   'published_on'  =>  $faker->dateTime()  ]);
      
    }
}
