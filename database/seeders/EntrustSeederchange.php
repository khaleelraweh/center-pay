<?php

//web menus Categories

use App\Models\Permission;

//web menu helper
$manageSiteSettings = Permission::create(['name' => 'manage_site_settings', 'display_name' => 'إدارة قوائم المساعدة' , 'route' => 'site_settings' , 'module' => 'site_settings' , 'as' => 'site_settings.index' , 'icon' => 'fa fa-list-ul' , 'parent' => '0' , 'parent_original' => '0' , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '5',] );
$manageSiteSettings->parent_show = $manageSiteSettings->id; $manageSiteSettings->save();

$showSiteSettings    =  Permission::create(['name' => 'show_site_settings'    ,  'display_name' => 'تصنيف قوائم المساعدة'      , 'route' => 'site_settings' , 'module' => 'site_settings' , 'as' => 'site_settings.index'    , 'icon' => 'fa fa-list-ul' , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '1' , 'appear' => '1'] );
$createSiteSettings  =  Permission::create(['name' => 'create_site_settings'  , 'display_name'  => 'إضافة تصنيف' , 'route' => 'site_settings' , 'module' => 'site_settings' , 'as' => 'site_settings.create'   , 'icon' => null                  , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$displaySiteSettings =  Permission::create(['name' => 'display_site_settings' , 'display_name'  => 'عرض تصنيف'   , 'route' => 'site_settings' , 'module' => 'site_settings' , 'as' => 'site_settings.show'     , 'icon' => null                  , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$updateSiteSettings  =  Permission::create(['name' => 'update_site_settings'  , 'display_name'  => 'تعديل تصنيف' , 'route' => 'site_settings' , 'module' => 'site_settings' , 'as' => 'site_settings.edit'     , 'icon' => null                  , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$deleteSiteSettings  =  Permission::create(['name' => 'delete_site_settings'  , 'display_name'  => 'حذف تصنيف' , 'route' => 'site_settings' , 'module' => 'site_settings' , 'as' => 'site_settings.destroy'  , 'icon' => null                  , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );
