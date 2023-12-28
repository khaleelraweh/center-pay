<?php

//web menus Categories

use App\Models\Permission;

//web menu helper

    $showSiteCounters    =  Permission::create(['name' => 'show_site_counters'    ,  'display_name' => 'عدادات الموقع'      , 'route' => 'site_counters' , 'module' => 'site_counters' , 'as' => 'site_counters.counter_index'    , 'icon' => 'fas fa-dollar-sign' , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '1' , 'appear' => '1'] );
    $displaySiteCounters =  Permission::create(['name' => 'display_site_counters' , 'display_name'  => 'عرض عدادات الموقع'   , 'route' => 'site_counters' , 'module' => 'site_counters' , 'as' => 'site_counters.show'     , 'icon' => null                  , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );
    $updateSiteCounters  =  Permission::create(['name' => 'update_site_counters'  , 'display_name'  => 'تعديل عدادات الموقع  ' , 'route' => 'site_counters' , 'module' => 'site_counters' , 'as' => 'site_counters.edit'     , 'icon' => null                  , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );
