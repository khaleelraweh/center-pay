<?php

//web menus Categories

use App\Models\Permission;

//web menu helper

// Site SEO
$showSitePaymentMethods    =  Permission::create(['name' => 'show_site_payment_methods'    ,  'display_name' => 'طرق الدفع'      , 'route' => 'site_payment_methods' , 'module' => 'site_payment_methods' , 'as' => 'site_payment_methods.meta_index'    , 'icon' => 'fa fa-tag' , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '1' , 'appear' => '1'] );
$displaySitePaymentMethods =  Permission::create(['name' => 'display_site_payment_methods' , 'display_name'  => 'عرض طرق الدفع'   , 'route' => 'site_payment_methods' , 'module' => 'site_payment_methods' , 'as' => 'site_payment_methods.show'     , 'icon' => null                  , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$updateSitePaymentMethods  =  Permission::create(['name' => 'update_site_payment_methods'  , 'display_name'  => 'تعديل طرق الدفع  ' , 'route' => 'site_payment_methods' , 'module' => 'site_payment_methods' , 'as' => 'site_payment_methods.edit'     , 'icon' => null                  , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );
