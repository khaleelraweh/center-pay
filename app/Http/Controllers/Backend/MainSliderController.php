<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SliderRequest;
use App\Models\Slider;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MainSliderController extends Controller
{ 

    public function index()
    {
        if(!auth()->user()->ability('admin','manage_main_sliders , show_main_sliders')){
            return redirect('admin/index');
        }

        $sliders = Slider::with('firstMedia')
        ->when(\request()->keyword != null , function($query){
            $query->search(\request()->keyword);
        })
        ->when(\request()->status != null , function($query){
            $query->where('status',\request()->status);
        })
        ->orderBy(\request()->sort_by ?? 'id' , \request()->order_by ?? 'desc')
        ->paginate(\request()->limit_by ?? 10);


        return view('backend.main_sliders.index',compact('sliders'));
        
    }

    public function create()
    {
        if(!auth()->user()->ability('admin','create_main_sliders')){
            return redirect('admin/index');
        }
        
        $tags = Tag::whereStatus(1)->get(['id','name']);

        return view('backend.main_sliders.create',compact('tags'));
    }

    public function store(SliderRequest $request)
    {
     
        if(!auth()->user()->ability('admin','create_main_sliders')){
            return redirect('admin/index');
        }

        // get Input from create.blade.php form request using SliderRequest to validate fields
        $input['title']          =   $request->title;
        $input['content']        =   $request->content;
        $input['url']            =   $request->url;
        $input['target']         =   $request->target;
        $input['featured']       =   $request->featured;
        $input['status']         =   $request->status;
        $input['publish_date']   =   $request->publish_date;
        $input['publish_time']   =   $request->publish_time;
        $input['view_in_main']   =   $request->view_in_main;
        $input['section']        =   1;
        $input['created_by']     =   auth()->user()->full_name;

        //Add slider to db with save instance of it in $slider to use it later 
        $slider = Slider::create($input);
        
        // make relation between this slider with tags choosed using tags()->attach(tags_id)
        $slider->tags()->attach($request->tags); 

        // add images to photos db and to path : public/assets/sliders
        if($request->images && count( $request->images) > 0){

            $i = 1; // $i is used for making sort to image 

            foreach ($request->images as $image) {
                
                // $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension(); // will not used because slider already created to db and slug is there by steps upove
                $file_name = $slider->slug. '_' . time() . $i . '.' . $image->getClientOriginalExtension(); // time() and $id used to avoid repeating image name 
                $file_size = $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets/sliders/' . $file_name);
                
                // get the real path of this image then resize its width to 500 and height let it aspect it with width
                Image::make($image->getRealPath())->resize(500,null,function($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);//then make copy of this image in new path as $path say with new name as $file_name say with clear 100%

                // add this photos to db using photos relational function
                $slider->photos()->create([
                    'file_name' =>$file_name,
                    'file_size' =>$file_size,
                    'file_type' =>$file_type,
                    'file_status' => 'true',
                    'file_sort' =>$i,
                ]); 

                $i++; // step ahead by one for sort new image 
            }
        }

        return redirect()->route('admin.main_sliders.index')->with([
            'message' => 'تمت الاضافة بنجاح',
            'alert-type' =>'success'
        ]);

    }

    public function show($id)
    {
        if(!auth()->user()->ability('admin','display_sliders')){
            return redirect('admin/index');
        }

        return view('backend.amin_sliders.show');
    }

 
    public function edit($slider)
    {
        $slider = Slider::findOrFail( $slider );
        if(!auth()->user()->ability('admin','update_main_sliders')){
            return redirect('admin/index');
        }

        // get all tags to add some of them to slider 
        $tags = Tag::whereStatus(1)->get(['id','name']); 

        return view('backend.main_sliders.edit',compact('tags' ,'slider'));
    }

    public function update(SliderRequest $request, $slider)
    {
        if(!auth()->user()->ability('admin','update_main_sliders')){
            return redirect('admin/index');
        }

        $slider = Slider::findOrFail($slider);

         // get Input from create.blade.php form request using sliderRequest to validate fields
        $input['title']          =   $request->title;
        $input['content']        =   $request->content;
        $input['url']            =   $request->url;
        $input['target']         =   $request->target;
        $input['featured']       =   $request->featured;
        $input['status']         =   $request->status;
        $input['publish_date']   =   $request->publish_date;
        $input['publish_time']   =   $request->publish_time;
        $input['view_in_main']   =   $request->view_in_main;
        $input['section']        =   1;
        $input['created_by']     =   auth()->user()->full_name;
        $input['updated_by']            =   auth()->user()->full_name;


         //Add slider to db with save instance of it in $slider to use it later 
         $slider->update($input);
         
        //  دالة السينك اذا كان في جديد ستضيفة فوق الاول اذا كان شي محذوف ستحذفة من الاول
         $slider->tags()->sync($request->tags);


        // edit images in photos db and in path : public/assets/sliders
        if($request->images && count( $request->images) > 0){

            $i = $slider->photos->count() + 1; // $i is used for making sort to image 

            foreach ($request->images as $image) {
                
                // $file_name = Str::slug($request->name).".".$image->getClientOriginalExtension(); // will not used because slider already created to db and slug is there by steps upove
                $file_name = $slider->slug. '_' . time() . $i . '.' . $image->getClientOriginalExtension(); // time() and $id used to avoid repeating image name 
                $file_size = $image->getSize();
                $file_type = $image->getMimeType();
                $path = public_path('assets/sliders/' . $file_name);
                
                // get the real path of this image then resize its width to 500 and height let it aspect it with width
                Image::make($image->getRealPath())->resize(500,null,function($constraint){
                    $constraint->aspectRatio();
                })->save($path,100);//then make copy of this image in new path as $path say with new name as $file_name say with clear 100%

                // add this photos to db using photos relational function
                $slider->photos()->create([
                    'file_name' =>$file_name,
                    'file_size' =>$file_size,
                    'file_type' =>$file_type,
                    'file_status' => 'true',
                    'file_sort' =>$i,
                ]); 

                $i++; // step ahead by one for sort new image 
            }
        }

        return redirect()->route('admin.main_sliders.index')->with([
            'message' => 'تم التعديل بنجاح',
            'alert-type' =>'success'
        ]);

    }



    public function destroy( $slider)
    {
        if(!auth()->user()->ability('admin','delete_main_sliders')){
            return redirect('admin/index');
        }

        $slider = Slider::findOrFail($slider);

        if($slider->photos->count() > 0){
            foreach($slider->photos as $photo){
                if(File::exists('assets/sliders/' . $photo->file_name)){
                    unlink('assets/sliders/' . $photo->file_name);
                }
                $photo->delete();
            }
        }

        $slider->delete();

        return redirect()->route('admin.main_sliders.index')->with([
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'success'
        ]);
    }

    public function remove_image(Request $request){

        if(!auth()->user()->ability('admin','delete_main_sliders')){
            return redirect('admin/index');
        }

        

        //find slider from slider table 
         $slider = Slider::findOrFail($request->slider_id);

         //find photos image from photos table 
         $image = $slider->photos()->where('id',$request->image_id)->first();

         if(File::exists('assets/sliders/' . $image->file_name)){
            // delete image from path 
             unlink('assets/sliders/' . $image->file_name);
         }
            //delete image from db
            $image->delete();

         return true;

    }
}
