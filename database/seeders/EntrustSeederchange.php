<?php

//web menus Categories

use App\Models\Permission;

$manageWebMenus = Permission::create(['name' => 'manage_web_menus', 'display_name' => 'إدارة القوائم' , 'route' => 'web_menus' , 'module' => 'web_menus' , 'as' => 'web_menus.index' , 'icon' => 'fas fa-file-archive' , 'parent' => '0' , 'parent_original' => '0' , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '15',] );
$manageWebMenus->parent_show = $manageWebMenus->id; $manageWebMenus->save();

$showWebMenus    =  Permission::create(['name' => 'show_web_menus'    ,  'display_name' => 'تصنيف القوائم'      , 'route' => 'web_menus' , 'module' => 'web_menus' , 'as' => 'web_menus.index'    , 'icon' => 'fas fa-file-archive' , 'parent' => $manageWebMenus->id , 'parent_original' => $manageWebMenus->id ,'parent_show' => $manageWebMenus->id , 'sidebar_link' => '1' , 'appear' => '1'] );
$createWebMenus  =  Permission::create(['name' => 'create_web_menus'  , 'display_name'  => 'إضافة تصنيف' , 'route' => 'web_menus' , 'module' => 'web_menus' , 'as' => 'web_menus.create'   , 'icon' => null                  , 'parent' => $manageWebMenus->id , 'parent_original' => $manageWebMenus->id ,'parent_show' => $manageWebMenus->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$displayWebMenus =  Permission::create(['name' => 'display_web_menus' , 'display_name'  => 'عرض تصنيف'   , 'route' => 'web_menus' , 'module' => 'web_menus' , 'as' => 'web_menus.show'     , 'icon' => null                  , 'parent' => $manageWebMenus->id , 'parent_original' => $manageWebMenus->id ,'parent_show' => $manageWebMenus->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$updateWebMenus  =  Permission::create(['name' => 'update_web_menus'  , 'display_name'  => 'تعديل تصنيف' , 'route' => 'web_menus' , 'module' => 'web_menus' , 'as' => 'web_menus.edit'     , 'icon' => null                  , 'parent' => $manageWebMenus->id , 'parent_original' => $manageWebMenus->id ,'parent_show' => $manageWebMenus->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$deleteWebMenus  =  Permission::create(['name' => 'delete_web_menus'  , 'display_name'  => 'حذف تصنيف' , 'route' => 'web_menus' , 'module' => 'web_menus' , 'as' => 'web_menus.destroy'  , 'icon' => null                  , 'parent' => $manageWebMenus->id , 'parent_original' => $manageWebMenus->id ,'parent_show' => $manageWebMenus->id , 'sidebar_link' => '0' , 'appear' => '0'] );
