<?php

//web menus Categories

use App\Models\Permission;


 //currencies
 $manageCurrencies = Permission::create(['name' => 'manage_currencies', 'display_name' => 'إدارة العملات ' , 'route' => 'currencies' , 'module' => 'currencies' , 'as' => 'currencies.index' , 'icon' => 'fa fa-money' , 'parent' => '0' , 'parent_original' => '0' , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '15',] );
 $manageCurrencies->parent_show = $manageCurrencies->id; $manageCurrencies->save();
 $showCurrencies    =  Permission::create(['name' => 'show_currencies'    , 'display_name' => 'العملات'     , 'route' => 'currencies' , 'module' => 'currencies' , 'as' => 'currencies.index'    , 'icon' => 'fa fa-money' , 'parent' => $manageCurrencies->id , 'parent_original' => $manageCurrencies->id ,'parent_show' => $manageCurrencies->id , 'sidebar_link' => '1' , 'appear' => '1'] );
 $createCurrencies  =  Permission::create(['name' => 'create_currencies'  , 'display_name'  => 'إضافة عملة جديدة'        , 'route' => 'currencies' , 'module' => 'currencies' , 'as' => 'currencies.create'   , 'icon' => null                  , 'parent' => $manageCurrencies->id , 'parent_original' => $manageCurrencies->id ,'parent_show' => $manageCurrencies->id , 'sidebar_link' => '0' , 'appear' => '0'] );
 $displayCurrencies =  Permission::create(['name' => 'display_currencies' , 'display_name'  => 'عرض العملة'             ,  'route' => 'currencies' , 'module' => 'currencies' , 'as' => 'currencies.show'     , 'icon' => null                  , 'parent' => $manageCurrencies->id , 'parent_original' => $manageCurrencies->id ,'parent_show' => $manageCurrencies->id , 'sidebar_link' => '0' , 'appear' => '0'] );
 $updateCurrencies  =  Permission::create(['name' => 'update_currencies'  , 'display_name'  => 'تعديل العملة'           ,  'route' => 'currencies' , 'module' => 'currencies' , 'as' => 'currencies.edit'     , 'icon' => null                  , 'parent' => $manageCurrencies->id , 'parent_original' => $manageCurrencies->id ,'parent_show' => $manageCurrencies->id , 'sidebar_link' => '0' , 'appear' => '0'] );
 $deleteCurrencies  =  Permission::create(['name' => 'delete_currencies'  , 'display_name'  => 'حذف العملة'             ,  'route' => 'currencies' , 'module' => 'currencies' , 'as' => 'currencies.destroy'  , 'icon' => null                  , 'parent' => $manageCurrencies->id , 'parent_original' => $manageCurrencies->id ,'parent_show' => $manageCurrencies->id , 'sidebar_link' => '0' , 'appear' => '0'] );
 