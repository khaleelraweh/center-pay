<?php

namespace App\Http\Controllers\Backend;

use illuminate\support\Str;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CardRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CardController extends Controller
{
   
    public function index()
    {
        if(!auth()->user()->ability('admin','manage_cards , show_cards')){
            return redirect('admin/index');
        }

        $categories = ProductCategory::withCount('products')->where('section',2)
        ->when(\request()->keyword != null , function($query){
            // $query->where('name','like','%'.\request()->keyword .'%');
            $query->search(\request()->keyword);
        })
        ->when(\request()->status != null , function($query){
            $query->where('status',\request()->status);
        })
        ->orderBy(\request()->sort_by ?? 'id' , \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 10);
        
        return view('backend.cards.index',compact('categories'));
        
    }

    public function create()
    {
        if(!auth()->user()->ability('admin','create_cards')){
            return redirect('admin/index');
        }

        return view('backend.cards.create');
    }

    public function store(CardRequest $request)
    {
        if(!auth()->user()->ability('admin','create_cards')){
            return redirect('admin/index');
        }

        $input['name'] = $request->name;
        $input['status'] = $request->status;
        $input['publish_date'] = $request->publish_date;
        $input['publish_time'] = $request->publish_time;
        $input['view_in_main'] = $request->view_in_main;
        $input['description'] = $request->description;
        $input['views'] = 0;
        $input['created_by'] = auth()->user()->full_name;
        $input['section'] = 2;


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

        return redirect()->route('admin.cards.index')->with([
            'message' => 'تم الانشاء بنجاح',
            'alert-type' => 'success'
        ]);
    }
    
    public function show($id)
    {
        if(!auth()->user()->ability('admin','display_cards')){
            return redirect('admin/index');
        }
        return view('backend.cards.show');
    }

  
    public function edit($id)
    {
        if(!auth()->user()->ability('admin','update_cards')){
            return redirect('admin/index');
        }
        $productCategory = ProductCategory::findOrFail($id);

        return view('backend.cards.edit',compact('productCategory'));
    }
    
    public function update(CardRequest $request, $id)
    {
        if(!auth()->user()->ability('admin','update_cards')){
            return redirect('admin/index');
        }
        
        $productCategory = ProductCategory::findOrFail($id);

        
        $input['name'] = $request->name;
        $input['parent_id'] = $request->parent_id;
        $input['status'] = $request->status;
        $input['publish_date'] = $request->publish_date;
        $input['publish_time'] = $request->publish_time;
        $input['view_in_main'] = $request->view_in_main;
        $input['description'] = $request->description;
        $input['views'] = 0;
        $input['updated_by'] = auth()->user()->full_name;
        $input['section'] = 2;

        $productCategory->update($input);
       
        

        // edit images in media db and in path : public/assets/products
        if($request->images && count( $request->images) > 0){

            $i = $productCategory->photo()->count() + 1; // $i is used for making sort to image 

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

        return redirect()->route('admin.cards.index')->with([
            'message' => 'تم التعديل بنجاح',
            'alert-type' => 'success'
        ]);
    }
    
   

    public function destroy($id)
    {
        $productCategory  = ProductCategory::findOrFail($id);

        if(!auth()->user()->ability('admin','delete_cards')){
            return redirect('admin/index');
        }

        if($productCategory->photo()->count() > 0){
            foreach($productCategory->photo() as $photo){
                
                if(File::exists('assets/product_categories/' . $photo->file_name)){
                    unlink('assets/product_categories/' . $photo->file_name);
                }
                
                $photo->delete();
            }
        }

        $productCategory->views = 0;
        $productCategory->deleted_by = auth()->user()->full_name;
        $productCategory->save();
        $productCategory->delete();

        return redirect()->route('admin.cards.index')->with([
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'success'
        ]);
    }

    public function remove_image(Request $request){

        if(!auth()->user()->ability('admin','delete_cards')){
            return redirect('admin/index');
        }

        // dd($request);

        $category = ProductCategory::findOrFail($request->product_category_id);

         //find media image from media table 
         $image = $category->photo()->whereId($request->image_id)->first();

        if(File::exists('assets/product_categories/' . $image->file_name)){
            unlink('assets/product_categories/' . $image->file_name);
        }

        $image->delete();

        return true;
    }
}
