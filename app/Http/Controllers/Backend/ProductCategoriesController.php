<?php

namespace App\Http\Controllers\Backend;

use illuminate\support\Str;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductCategoriesController extends Controller
{
   
    public function index()
    {
        if(!auth()->user()->ability('admin','manage_product_categories , show_product_categories')){
            return redirect('admin/index');
        }

        $categories = ProductCategory::withCount('products')
        ->when(\request()->keyword != null , function($query){
            // $query->where('name','like','%'.\request()->keyword .'%');
            $query->search(\request()->keyword);
        })
        ->when(\request()->status != null , function($query){
            $query->where('status',\request()->status);
        })
        ->orderBy(\request()->sort_by ?? 'id' , \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 10);
        
        return view('backend.product_categories.index',compact('categories'));
        
    }

    public function create()
    {
        if(!auth()->user()->ability('admin','create_product_categories')){
            return redirect('admin/index');
        }

        $main_categories =ProductCategory::whereNull('parent_id')->get(['id','name']);
        return view('backend.product_categories.create',compact('main_categories'));
    }

    public function store(ProductCategoryRequest $request)
    {
        if(!auth()->user()->ability('admin','create_product_categories')){
            return redirect('admin/index');
        }

        $input['name'] = $request->name;
        $input['parent_id'] = $request->parent_id;
        $input['status'] = $request->status;
        $input['publish_date'] = $request->publish_date;
        $input['publish_time'] = $request->publish_time;
        $input['view_in_main'] = $request->view_in_main;
        $input['description'] = $request->description;
       
        $productCategory = ProductCategory::create($input);

        // add images to media db and to path : public/assets/products
        if($request->images && count( $request->images) > 0){

            $i = 1; // $i is used for making sort to image 

            foreach ($request->images as $image) {
                
                // $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension(); // will not used because product already created to db and slug is there by steps upove
                $file_name = $productCategory->slug. '_' . time() . $i . '.' . $image->getClientOriginalExtension(); // time() and $id used to avoid repeating image name 
                $file_size = $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets/product_categories/' . $file_name);
                
                // get the real path of this image then resize its width to 500 and height let it aspect it with width
                Image::make($image->getRealPath())->resize(500,null,function($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);//then make copy of this image in new path as $path say with new name as $file_name say with clear 100%

                // add this media to db using media relational function
                $productCategory->photo()->create([
                    'file_name' =>$file_name,
                    'file_size' =>$file_size,
                    'file_type' =>$file_type,
                    'file_status' => 'true',
                    'file_sort' =>$i,
                ]); 

                $i++; // step ahead by one for sort new image 
            }
        }

        // اعادة التوجية الي صفحة العرض مع رسالة نجاح العملية 
        return redirect()->route('admin.product_categories.index')->with([
            'message' => 'created successfully',
            'alert-type' => 'success'
        ]);
    }
    
    public function show($id)
    {
        if(!auth()->user()->ability('admin','display_product_categories')){
            return redirect('admin/index');
        }
        return view('backend.product_categories.show');
    }

    public function edit(ProductCategory $productCategory)
    {
        if(!auth()->user()->ability('admin','update_product_categories')){
            return redirect('admin/index');
        }

        $main_categories = ProductCategory::whereNull('parent_id')->get(['id','name']);
        return view('backend.product_categories.edit',compact('main_categories' , 'productCategory'));
    }
    
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        if(!auth()->user()->ability('admin','update_product_categories')){
            return redirect('admin/index');
        }

        $input['name'] = $request->name;
        $input['slug'] = null; // slug should be change because name maybe change in db
        $input['status'] = $request->status;
        $input['parent_id'] = $request->parent_id;

        if ($image = $request->file('cover')) {

            //check $productCategory->cover if it is not null  and it is exist in the path assets/product_categories
            // Then unlink this image from project path   
            if($productCategory->cover != null && File::exists('assets/product_categories/' . $productCategory->cover)){
                unlink('assets/product_categories/' . $productCategory->cover);
            }
            $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension();
            $path = public_path('assets/product_categories/'.$file_name);
            Image::make($image->getRealPath())->resize(500,null,function($constraint){
                $constraint->aspectRatio();
            })->save($path);

            $input['cover'] = $file_name;
        }
        $productCategory->update($input);

        return redirect()->route('admin.product_categories.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(ProductCategory $productCategory)
    {
        if(!auth()->user()->ability('admin','delete_product_categories')){
            return redirect('admin/index');
        }

        // first: delete image from project path 
        if(File::exists('assets/product_categories/' . $productCategory->cover)){
            unlink('assets/product_categories/' . $productCategory->cover);
        }
        // second: delete productCategory from database
        $productCategory->delete();

        return redirect()->route('admin.product_categories.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }

    public function remove_image(Request $request){

        if(!auth()->user()->ability('admin','delete_product_categories')){
            return redirect('admin/index');
        }

        // اعثر علي رقم قسم الصنف الحالي 
        $category = ProductCategory::findOrFail($request->product_category_id);
        // من الفايل ابحث عن اسم الصورة في مجلد الصور في المشروع ما اذا كانت موجودة
        if(File::exists('assets/product_categories/' . $category->cover)){
            // اذا كانت موجودة احذفها من مسار حفظ الصور في البرنامج
            unlink('assets/product_categories/' . $category->cover);
            // غير قيمتها في الجدول الي نل 
            $category->cover = null;
            // احفظ التغييرات علي قسم الصنف الحالي 
            $category->save();
        }

        return true;
    }
}