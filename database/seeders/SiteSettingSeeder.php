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

        // site infos
        SiteSetting::create(['name'    =>  'site_name'          ,   'value' =>  'Center Pay'                    ,   'status'    =>  true    ,   'section'   =>  1   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_short_name'    ,   'value' =>  'CP'                            ,   'status'    =>  true    ,   'section'   =>  1   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_description'   ,   'value' =>  'This is description'           ,   'status'    =>  true    ,   'section'   =>  1   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_link'          ,   'value' =>  'https://shop.mudhila.com/'     ,   'status'    =>  true    ,   'section'   =>  1   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_img'           ,   'value' =>  '1.jpg'                         ,   'status'    =>  true    ,   'section'   =>  1   ,   'published_on'  =>  $faker->dateTime()  ]);

        // site contacts
        SiteSetting::create(['name'    =>  'site_address'   ,   'value' =>  'المملكة العربية السعودية'    ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_phone'     ,   'value' =>  '772036131'                     ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_mobile'    ,   'value' =>  '436285'                        ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_fax'       ,   'value' =>  'fx'                            ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_po_box'    ,   'value' =>  '985'                           ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_email1'    ,   'value' =>  'centerpay@gmail.com'           ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_email2'    ,   'value' =>  'centerpay2@gmail.com'          ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_workTime'  ,   'value' =>  'طوال ايام الاسبوع'             ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);

        // site socials
        SiteSetting::create(['name'    =>  'site_facebook'      ,   'value' =>  'centerpay.facebook.com'    ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_twitter'       ,   'value' =>  'Center.twitter.com'        ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_youtube'       ,   'value' =>  'Center.youtube.com'        ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_snapchat'       ,   'value' =>  'Center.snapchat.com'        ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_instagram'     ,   'value' =>  'Center.instegram.com'      ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);

        // site seo
        SiteSetting::create(['name'    =>  'site_name_meta'             ,   'value' =>  'Center Pay'                ,   'status'    =>  true  ,   'section'   =>  4   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_description_meta'      ,   'value' =>  'Center Pay description'    ,   'status'    =>  true  ,   'section'   =>  4   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_link_meta'             ,   'value' =>  'Center Pay links here'     ,   'status'    =>  true  ,   'section'   =>  4   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_keywords_meta'         ,   'value' =>  'cards , products'          ,   'status'    =>  true  ,   'section'   =>  4   ,   'published_on'  =>  $faker->dateTime()  ]);
      
    }
}
