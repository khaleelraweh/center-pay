<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Dictionary : 
     *              01- Roles 
     *              02- Users
     *              03- AttachRoles To  Users
     *              04- Create random customer and  AttachRole to customerRole
     * 
     * 
     * @return void
     */
    public function run()
    {

        //create fake information  using faker factory lab 
        $faker = Factory::create();


        //------------- 01- Roles ------------//
        //adminRole
        $adminRole = new Role();
        $adminRole->name         = 'admin';
        $adminRole->display_name = 'User Administrator'; // optional
        $adminRole->description  = 'User is allowed to manage and edit other users'; // optional
        $adminRole->allowed_route= 'admin';
        $adminRole->save();

        //supervisorRole
        $supervisorRole = Role::create([
            'name'=>'supervisor',
            'display_name'=>'User Supervisor',
            'description'=>'Supervisor is allowed to manage and edit other users',
            'allowed_route'=>'admin',
        ]);


        //customerRole
        $customerRole = new Role();
        $customerRole->name         = 'customer';
        $customerRole->display_name = 'Project Customer'; // optional
        $customerRole->description  = 'Customer is the customer of a given project'; // optional
        $customerRole->allowed_route= null;
        $customerRole->save();


        //------------- 02- Users  ------------//
        // Create Admin
        $admin = new User();
        $admin->first_name = 'Admin';
        $admin->last_name = 'System';
        $admin->username = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->email_verified_at = now();
        $admin->mobile = '00967772036131';
        $admin->password = bcrypt('123123123');
        $admin->user_image = 'avator.svg';
        $admin->status = 1;
        $admin->remember_token = Str::random(10);
        $admin->save();

        // Create supervisor
        $supervisor = User::create([
            'first_name'=>'Supervisor',
            'last_name'=>'System',
            'username'=>'supervisor',
            'email'=>'supervisor@gmail.com',
            'email_verified_at'=>now(),
            'mobile'=>'00967772036132',
            'password'=>bcrypt('123123123'),
            'user_image'=>'avator.svg',
            'status'=>1,
            'remember_token'=>Str::random(10),
        ]);

        // Create customer
        $customer = User::create([
            'first_name'=>'Khaleel',
            'last_name'=>'Raweh',
            'username'=>'khaleel',
            'email'=>'khaleelvisa@gmail.com',
            'email_verified_at'=>now(),
            'mobile'=>'00967772036133',
            'password'=>bcrypt('123123123'),
            'user_image'=>'avator.svg',
            'status'=>1,
            'remember_token'=>Str::random(10),
        ]);

        //------------- 03- AttachRoles To  Users  ------------//
        $admin->attachRole($adminRole);
        $supervisor->attachRole($supervisorRole);
        $customer->attachRole($customerRole);


        //------------- 04-  Create random customer and  AttachRole to customerRole  ------------//
        for ($i = 1; $i <= 20; $i++){
            //Create random customer
            $random_customer = User::create([
                'first_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'username'=>$faker->unique()->userName,
                'email'=>$faker->unique()->email,
                'email_verified_at'=>now(),
                'mobile'=>'0096777'.$faker->numberBetween(1000000,9999999),
                'password'=>bcrypt('123123123'),
                'user_image'=>'avator.svg',
                'status'=>1,
                'remember_token'=>Str::random(10),
            ]);

            //Add customerRole to RandomCusomer
            $random_customer->attachRole($customerRole);

        }//end for


        //------------- 05- Permission  ------------//
        //manage main dashboard page
        $manageMain = Permission::create(['name'=>'main', 'display_name'=>'الرئيسية', 'route'=>'index', 'module'=>'index', 'as'=>'index', 'icon'=>'ri-dashboard-line', 'parent'=>'0', 'parent_original'=>'0', 'sidebar_link'=>'1', 'appear'=>'1', 'ordering'=>'1']);
        $manageMain->parent_show = $manageMain->id;
        $manageMain->save();


        //Procuct Categories
        $manageProductCategories = Permission::create(['name' => 'manage_product_categories', 'display_name' => 'إدارة المنتجات' , 'route' => 'product_categories' , 'module' => 'product_categories' , 'as' => 'product_categories.index' , 'icon' => 'fas fa-file-archive' , 'parent' => '0' , 'parent_original' => '0' , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '10',] );
        $manageProductCategories->parent_show = $manageProductCategories->id; $manageProductCategories->save();

        $showProductCategories    =  Permission::create(['name' => 'show_product_categories'    ,  'display_name' => 'تصنيف المنتجات'      , 'route' => 'product_categories' , 'module' => 'product_categories' , 'as' => 'product_categories.index'    , 'icon' => 'fas fa-file-archive' , 'parent' => $manageProductCategories->id , 'parent_original' => $manageProductCategories->id ,'parent_show' => $manageProductCategories->id , 'sidebar_link' => '1' , 'appear' => '1'] );
        $createProductCategories  =  Permission::create(['name' => 'create_product_categories'  , 'display_name'  => 'إضافة تصنيف' , 'route' => 'product_categories' , 'module' => 'product_categories' , 'as' => 'product_categories.create'   , 'icon' => null                  , 'parent' => $manageProductCategories->id , 'parent_original' => $manageProductCategories->id ,'parent_show' => $manageProductCategories->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $displayProductCategories =  Permission::create(['name' => 'display_product_categories' , 'display_name'  => 'عرض تصنيف'   , 'route' => 'product_categories' , 'module' => 'product_categories' , 'as' => 'product_categories.show'     , 'icon' => null                  , 'parent' => $manageProductCategories->id , 'parent_original' => $manageProductCategories->id ,'parent_show' => $manageProductCategories->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $updateProductCategories  =  Permission::create(['name' => 'update_product_categories'  , 'display_name'  => 'تعديل تصنيف' , 'route' => 'product_categories' , 'module' => 'product_categories' , 'as' => 'product_categories.edit'     , 'icon' => null                  , 'parent' => $manageProductCategories->id , 'parent_original' => $manageProductCategories->id ,'parent_show' => $manageProductCategories->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $deleteProductCategories  =  Permission::create(['name' => 'delete_product_categories'  , 'display_name'  => 'حذف تصنيف' , 'route' => 'product_categories' , 'module' => 'product_categories' , 'as' => 'product_categories.destroy'  , 'icon' => null                  , 'parent' => $manageProductCategories->id , 'parent_original' => $manageProductCategories->id ,'parent_show' => $manageProductCategories->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        

        //Products 
        $manageProducts = Permission::create(['name' => 'manage_products', 'display_name' => 'المنتجات' , 'route' => 'products' , 'module' => 'products' , 'as' => 'products.index' , 'icon' => 'fas fa-file-archive' , 'parent' => $manageProductCategories->id , 'parent_original' => '0' , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '15',] );
        $manageProducts->parent_show = $manageProducts->id; $manageProducts->save();
        $showProducts    =  Permission::create(['name' => 'show_products'    ,  'display_name' => 'المنتجات'       , 'route' => 'products' , 'module' => 'products' , 'as' => 'products.index'    , 'icon' => 'fas fa-file-archive'  , 'parent' => $manageProducts->id , 'parent_original' => $manageProducts->id ,'parent_show' => $manageProducts->id , 'sidebar_link' => '1' , 'appear' => '1'] );
        $createProducts  =  Permission::create(['name' => 'create_products'  , 'display_name'  => 'إضافة منتج'    , 'route' => 'products' , 'module' => 'products' , 'as' => 'products.create'   , 'icon' => null           , 'parent' => $manageProducts->id , 'parent_original' => $manageProducts->id ,'parent_show' => $manageProducts->id , 'sidebar_link' => '1' , 'appear' => '0'] );
        $displayProducts =  Permission::create(['name' => 'display_products' , 'display_name'  => 'عرض منتج'            , 'route' => 'products' , 'module' => 'products' , 'as' => 'products.show'     , 'icon' => null           , 'parent' => $manageProducts->id , 'parent_original' => $manageProducts->id ,'parent_show' => $manageProducts->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $updateProducts  =  Permission::create(['name' => 'update_products'  , 'display_name'  => 'تحديث منتج'          , 'route' => 'products' , 'module' => 'products' , 'as' => 'products.edit'     , 'icon' => null           , 'parent' => $manageProducts->id , 'parent_original' => $manageProducts->id ,'parent_show' => $manageProducts->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $deleteProducts  =  Permission::create(['name' => 'delete_products'  , 'display_name'  => 'حذف منتج'            , 'route' => 'products' , 'module' => 'products' , 'as' => 'products.destroy'  , 'icon' => null           , 'parent' => $manageProducts->id , 'parent_original' => $manageProducts->id ,'parent_show' => $manageProducts->id , 'sidebar_link' => '0' , 'appear' => '0'] );


         //manage cards
         $manageCards = Permission::create(['name' => 'manage_cards', 'display_name' => 'إدارة البطائق' , 'route' => 'cards' , 'module' => 'cards' , 'as' => 'cards.index' , 'icon' => 'fas fa-file-archive' , 'parent' => '0', 'parent_original' => '0' , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '20',] );
         $manageCards->parent_show = $manageCards->id; $manageCards->save();
 
         $showCards    =  Permission::create(['name' => 'show_cards'    , 'display_name'  => 'تصنيف البطائق'        ,   'route' => 'cards' , 'module' => 'cards' , 'as' => 'cards.index'    , 'icon' => 'fas fa-file-archive' , 'parent' => $manageCards->id , 'parent_original' => $manageCards->id ,'parent_show' => $manageCards->id , 'sidebar_link' => '1' , 'appear' => '1'] );
         $createCards  =  Permission::create(['name' => 'create_cards'  , 'display_name'  => 'إنشاء تصنيف بطاقة'   ,    'route' => 'cards' , 'module' => 'cards' , 'as' => 'cards.create'   , 'icon' => null                  , 'parent' => $manageCards->id , 'parent_original' => $manageCards->id ,'parent_show' => $manageCards->id , 'sidebar_link' => '0' , 'appear' => '0'] );
         $displayCards =  Permission::create(['name' => 'display_cards' , 'display_name'  => 'عرض عرض تصنيف بطاقة' ,    'route' => 'cards' , 'module' => 'cards' , 'as' => 'cards.show'     , 'icon' => null                  , 'parent' => $manageCards->id , 'parent_original' => $manageCards->id ,'parent_show' => $manageCards->id , 'sidebar_link' => '0' , 'appear' => '0'] );
         $updateCards  =  Permission::create(['name' => 'update_cards'  , 'display_name'  => 'تعديل تصنيف بطاقة'   ,    'route' => 'cards' , 'module' => 'cards' , 'as' => 'cards.edit'     , 'icon' => null                  , 'parent' => $manageCards->id , 'parent_original' => $manageCards->id ,'parent_show' => $manageCards->id , 'sidebar_link' => '0' , 'appear' => '0'] );
         $deleteCards  =  Permission::create(['name' => 'delete_cards'  , 'display_name'  => 'حذف تصنيف بطاقة'     ,    'route' => 'cards' , 'module' => 'cards' , 'as' => 'cards.destroy'  , 'icon' => null                  , 'parent' => $manageCards->id , 'parent_original' => $manageCards->id ,'parent_show' => $manageCards->id , 'sidebar_link' => '0' , 'appear' => '0'] );
 

        //Manage Product cards 
        $manageProduct_cards = Permission::create(['name' => 'manage_product_cards', 'display_name' => 'البطائق' , 'route' => 'product_cards' , 'module' => 'product_cards' , 'as' => 'product_cards.index' , 'icon' => 'fas fa-file-archive' , 'parent' => $manageCards->id , 'parent_original' => '0' , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '25',] );
        $manageProduct_cards->parent_show = $manageProduct_cards->id; $manageProduct_cards->save();
        $showProduct_cards    =  Permission::create(['name' => 'show_product_cards'    ,   'display_name'    => 'عرض البطائق'         ,   'route'     => 'product_cards'   , 'module'   => 'product_cards' , 'as' =>  'product_cards.index'    , 'icon' => 'fas fa-file-archive'  , 'parent' => $manageProduct_cards->id , 'parent_original' => $manageProduct_cards->id ,'parent_show' => $manageProduct_cards->id , 'sidebar_link' => '1' , 'appear' => '1'] );
        $createProduct_cards  =  Permission::create(['name' => 'create_product_cards'  ,   'display_name'    => 'إضافة بطاقة جديدة'  ,   'route'     => 'product_cards'    , 'module'  => 'product_cards' , 'as' =>   'product_cards.create'   , 'icon' => null           , 'parent' => $manageProduct_cards->id , 'parent_original' => $manageProduct_cards->id ,'parent_show' => $manageProduct_cards->id , 'sidebar_link' => '1' , 'appear' => '0'] );
        $displayProduct_cards =  Permission::create(['name' => 'display_product_cards' ,   'display_name'    => 'عرض باقة'            ,   'route'     => 'product_cards'   ,  'module'  => 'product_cards' , 'as' =>  'product_cards.show'     , 'icon' => null           , 'parent' => $manageProduct_cards->id , 'parent_original' => $manageProduct_cards->id ,'parent_show' => $manageProduct_cards->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $updateProduct_cards  =  Permission::create(['name' => 'update_product_cards'  ,   'display_name'    => 'تحديث بطاقة'         ,   'route'     => 'product_cards'   , 'module'   => 'product_cards' , 'as' =>  'product_cards.edit'     , 'icon' => null           , 'parent' => $manageProduct_cards->id , 'parent_original' => $manageProduct_cards->id ,'parent_show' => $manageProduct_cards->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $deleteProduct_cards  =  Permission::create(['name' => 'delete_product_cards'  ,   'display_name'    => 'حذف بطاقة'           ,   'route'     => 'product_cards'   , 'module'   => 'product_cards' , 'as' =>  'product_cards.destroy'  , 'icon' => null           , 'parent' => $manageProduct_cards->id , 'parent_original' => $manageProduct_cards->id ,'parent_show' => $manageProduct_cards->id , 'sidebar_link' => '0' , 'appear' => '0'] );

        //sliders
        $manageSliders = Permission::create(['name' => 'manage_sliders', 'display_name' => 'إدارة عارض الشرائح' , 'route' => 'sliders' , 'module' => 'sliders' , 'as' => 'sliders.index' , 'icon' => 'fas fa-sliders-h' , 'parent' => '0' , 'parent_original' => '0' , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '30',] );
        $manageSliders->parent_show = $manageSliders->id; $manageSliders->save();

        $showProductCategories    =  Permission::create(['name' => 'show_sliders'    , 'display_name' => 'عارض الشرائح الرئيسي'     , 'route' => 'sliders' , 'module' => 'sliders' , 'as' => 'sliders.index'    , 'icon' => 'fas  fa-sliders-h' , 'parent' => $manageSliders->id , 'parent_original' => $manageSliders->id ,'parent_show' => $manageSliders->id , 'sidebar_link' => '1' , 'appear' => '1'] );
        $createProductCategories  =  Permission::create(['name' => 'create_sliders'  , 'display_name'  => 'إضافة شريحة جديد'        , 'route' => 'sliders' , 'module' => 'sliders' , 'as' => 'sliders.create'   , 'icon' => null                  , 'parent' => $manageSliders->id , 'parent_original' => $manageSliders->id ,'parent_show' => $manageSliders->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $displayProductCategories =  Permission::create(['name' => 'display_sliders' , 'display_name'  => 'عرض الشريحة'             ,  'route' => 'sliders' , 'module' => 'sliders' , 'as' => 'sliders.show'     , 'icon' => null                  , 'parent' => $manageSliders->id , 'parent_original' => $manageSliders->id ,'parent_show' => $manageSliders->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $updateProductCategories  =  Permission::create(['name' => 'update_sliders'  , 'display_name'  => 'تعديل الشريحة'           ,  'route' => 'sliders' , 'module' => 'sliders' , 'as' => 'sliders.edit'     , 'icon' => null                  , 'parent' => $manageSliders->id , 'parent_original' => $manageSliders->id ,'parent_show' => $manageSliders->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $deleteProductCategories  =  Permission::create(['name' => 'delete_sliders'  , 'display_name'  => 'حذف الشريحة'             ,  'route' => 'sliders' , 'module' => 'sliders' , 'as' => 'sliders.destroy'  , 'icon' => null                  , 'parent' => $manageSliders->id , 'parent_original' => $manageSliders->id ,'parent_show' => $manageSliders->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        

        //Product Tags
        $manageTags = Permission::create(['name' => 'manage_tags', 'display_name' => 'إدارة الكلمات المفتاحية' , 'route' => 'tags' , 'module' => 'tags' , 'as' => 'tags.index' , 'icon' => 'fas fa-tags' , 'parent' => '0' , 'parent_original' => '0' , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '35',] );
        $manageTags->parent_show = $manageTags->id; $manageTags->save();
        $showTags    =  Permission::create(['name' => 'show_tags'    ,  'display_name' => 'عرض الكلمات المفتاحية'       , 'route' => 'tags' , 'module' => 'tags' , 'as' => 'tags.index'    , 'icon' => 'fas fa-tags'  , 'parent' => $manageTags->id , 'parent_original' => $manageTags->id ,'parent_show' => $manageTags->id , 'sidebar_link' => '1' , 'appear' => '1'] );
        $createTags  =  Permission::create(['name' => 'create_tags'  , 'display_name'  => 'إضافة كلمة مفتاحية' , 'route' => 'tags' , 'module' => 'tags' , 'as' => 'tags.create'   , 'icon' => null           , 'parent' => $manageTags->id , 'parent_original' => $manageTags->id ,'parent_show' => $manageTags->id , 'sidebar_link' => '1' , 'appear' => '0'] );
        $displayTags =  Permission::create(['name' => 'display_tags' , 'display_name'  => 'استعراض كلمة مفتاحية'   , 'route' => 'tags' , 'module' => 'tags' , 'as' => 'tags.show'     , 'icon' => null           , 'parent' => $manageTags->id , 'parent_original' => $manageTags->id ,'parent_show' => $manageTags->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $updateTags  =  Permission::create(['name' => 'update_tags'  , 'display_name'  => 'تعديل كلمة مفتاحية' , 'route' => 'tags' , 'module' => 'tags' , 'as' => 'tags.edit'     , 'icon' => null           , 'parent' => $manageTags->id , 'parent_original' => $manageTags->id ,'parent_show' => $manageTags->id , 'sidebar_link' => '0' , 'appear' => '0'] );
        $deleteTags  =  Permission::create(['name' => 'delete_tags'  , 'display_name'  => 'حذف لكمة مفتاحية' , 'route' => 'tags' , 'module' => 'tags' , 'as' => 'tags.destroy'  , 'icon' => null           , 'parent' => $manageTags->id , 'parent_original' => $manageTags->id ,'parent_show' => $manageTags->id , 'sidebar_link' => '0' , 'appear' => '0'] );

        
    }
}
