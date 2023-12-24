<?php

//web menus Categories

use App\Models\Permission;

//web menu helper
$manageWebMenuHelps = Permission::create(['name' => 'manage_web_menu_helps', 'display_name' => 'إدارة قوائم المساعدة' , 'route' => 'web_menu_helps' , 'module' => 'web_menu_helps' , 'as' => 'web_menu_helps.index' , 'icon' => 'fa fa-list-ul' , 'parent' => '0' , 'parent_original' => '0' , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '5',] );
$manageWebMenuHelps->parent_show = $manageWebMenuHelps->id; $manageWebMenuHelps->save();

$showWebMenuHelps    =  Permission::create(['name' => 'show_web_menu_helps'    ,  'display_name' => 'تصنيف قوائم المساعدة'      , 'route' => 'web_menu_helps' , 'module' => 'web_menu_helps' , 'as' => 'web_menu_helps.index'    , 'icon' => 'fa fa-list-ul' , 'parent' => $manageWebMenuHelps->id , 'parent_original' => $manageWebMenuHelps->id ,'parent_show' => $manageWebMenuHelps->id , 'sidebar_link' => '1' , 'appear' => '1'] );
$createWebMenuHelps  =  Permission::create(['name' => 'create_web_menu_helps'  , 'display_name'  => 'إضافة تصنيف' , 'route' => 'web_menu_helps' , 'module' => 'web_menu_helps' , 'as' => 'web_menu_helps.create'   , 'icon' => null                  , 'parent' => $manageWebMenuHelps->id , 'parent_original' => $manageWebMenuHelps->id ,'parent_show' => $manageWebMenuHelps->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$displayWebMenuHelps =  Permission::create(['name' => 'display_web_menu_helps' , 'display_name'  => 'عرض تصنيف'   , 'route' => 'web_menu_helps' , 'module' => 'web_menu_helps' , 'as' => 'web_menu_helps.show'     , 'icon' => null                  , 'parent' => $manageWebMenuHelps->id , 'parent_original' => $manageWebMenuHelps->id ,'parent_show' => $manageWebMenuHelps->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$updateWebMenuHelps  =  Permission::create(['name' => 'update_web_menu_helps'  , 'display_name'  => 'تعديل تصنيف' , 'route' => 'web_menu_helps' , 'module' => 'web_menu_helps' , 'as' => 'web_menu_helps.edit'     , 'icon' => null                  , 'parent' => $manageWebMenuHelps->id , 'parent_original' => $manageWebMenuHelps->id ,'parent_show' => $manageWebMenuHelps->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$deleteWebMenuHelps  =  Permission::create(['name' => 'delete_web_menu_helps'  , 'display_name'  => 'حذف تصنيف' , 'route' => 'web_menu_helps' , 'module' => 'web_menu_helps' , 'as' => 'web_menu_helps.destroy'  , 'icon' => null                  , 'parent' => $manageWebMenuHelps->id , 'parent_original' => $manageWebMenuHelps->id ,'parent_show' => $manageWebMenuHelps->id , 'sidebar_link' => '0' , 'appear' => '0'] );
