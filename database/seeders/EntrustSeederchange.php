<?php

//web menus Categories

use App\Models\Permission;

//web menu helper
// AccountSettingBackend
$showAccountSettings    =  Permission::create(['name' => 'show_account_settings'    ,  'display_name' => 'إعدادات الحساب'      , 'route' => 'account_settings' , 'module' => 'account_settings' , 'as' => 'account_settings.index'    , 'icon' => 'fas fa-calculator' , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '1' , 'appear' => '1'] );
$displayAccountSettings =  Permission::create(['name' => 'display_account_settings' , 'display_name'  => 'عرض إعدادات الحساب'   , 'route' => 'account_settings' , 'module' => 'account_settings' , 'as' => 'account_settings.show'     , 'icon' => null                  , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$updateAccountSettings  =  Permission::create(['name' => 'update_account_settings'  , 'display_name'  => 'تعديل إعدادات الحساب  ' , 'route' => 'account_settings' , 'module' => 'account_settings' , 'as' => 'account_settings.edit'     , 'icon' => null                  , 'parent' => $manageSiteSettings->id , 'parent_original' => $manageSiteSettings->id ,'parent_show' => $manageSiteSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );


