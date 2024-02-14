<?php

//web menus Categories

use App\Models\Permission;


//currencies
//Card Code 
$manageCardCodes = Permission::create(['name' => 'manage_card_codes', 'display_name' => ['ar'   =>  'إدارة اكواد البطائق',   'en'    =>  'Manage Card Codes'], 'route' => 'card_codes', 'module' => 'card_codes', 'as' => 'card_codes.index', 'icon' => 'fas fa-file-archive', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '110',]);
$manageCardCodes->parent_show = $manageCardCodes->id;
$manageCardCodes->save();
$showCardCodes    =  Permission::create(['name' => 'show_card_codes',  'display_name'   =>  ['ar'   =>  ' اكواد البطائق',   'en'    =>  'Card Codes'], 'route' => 'card_codes', 'module' => 'card_codes', 'as' => 'card_codes.index', 'icon' => 'fas fa-file-archive', 'parent' => $manageCardCodes->id, 'parent_original' => $manageCardCodes->id, 'parent_show' => $manageCardCodes->id, 'sidebar_link' => '1', 'appear' => '1']);
$createCardCodes  =  Permission::create(['name' => 'create_card_codes', 'display_name'  =>  ['ar'   =>  'إضافة كود بطاقة ',   'en'    =>  'Create Card Code'], 'route' => 'card_codes', 'module' => 'card_codes', 'as' => 'card_codes.create', 'icon' => null, 'parent' => $manageCardCodes->id, 'parent_original' => $manageCardCodes->id, 'parent_show' => $manageCardCodes->id, 'sidebar_link' => '0', 'appear' => '0']);
$displayCardCodes =  Permission::create(['name' => 'display_card_codes', 'display_name' =>  ['ar'   =>  'عرض كود بطاقة ',   'en'    =>  'Display Card Code'], 'route' => 'card_codes', 'module' => 'card_codes', 'as' => 'card_codes.show', 'icon' => null, 'parent' => $manageCardCodes->id, 'parent_original' => $manageCardCodes->id, 'parent_show' => $manageCardCodes->id, 'sidebar_link' => '0', 'appear' => '0']);
$updateCardCodes  =  Permission::create(['name' => 'update_card_codes', 'display_name'  =>  ['ar'   =>  'تعديل كود بطاقة ',   'en'    =>  'Edit Card Code'], 'route' => 'card_codes', 'module' => 'card_codes', 'as' => 'card_codes.edit', 'icon' => null, 'parent' => $manageCardCodes->id, 'parent_original' => $manageCardCodes->id, 'parent_show' => $manageCardCodes->id, 'sidebar_link' => '0', 'appear' => '0']);
$deleteCardCodes  =  Permission::create(['name' => 'delete_card_codes', 'display_name'  =>  ['ar'   =>  'حذف كود بطاقة ',   'en'    =>  'Delete Card Code'], 'route' => 'card_codes', 'module' => 'card_codes', 'as' => 'card_codes.destroy', 'icon' => null, 'parent' => $manageCardCodes->id, 'parent_original' => $manageCardCodes->id, 'parent_show' => $manageCardCodes->id, 'sidebar_link' => '0', 'appear' => '0']);
