@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="{{asset('backend/vendor/select2/css/select2.min.css')}}">

    {{-- pickadate calling css --}}
    <link rel="stylesheet" href="{{asset('backend/vendor/datepicker/themes/classic.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/datepicker/themes/classic.date.css')}}">

    {{-- is used to make tab-content --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <style>
        .picker__select--month,.picker__select--year{
            padding: 0 !important;
        }
        .picker__list{
            list-style-type: none;
        }
        .x-title{
            border-bottom: 2px solid #E6E9ED;
            padding: 1px 5px 6px;
            margin-bottom: 10px;
        }
        .select2-container{
            display: block !important;
        }
        .note-editor.note-airframe, .note-editor.note-frame{
            margin-bottom: 0;
        }
        .require.red{color:red;}
    </style>
@endsection

@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">تعديل الشريحة {{$slider->name}}</h6>
            <div class="ml-auto">
                <a href="{{route('admin.main_sliders.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">إدارة عارض الشرائح الرئيسية</span>
                </a>
            </div>
        </div>

        {{-- body part  --}}
        <div class="card-body">

            {{-- erorrs show is exists --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- enctype used cause we will save images  --}}
            <form action="{{route('admin.main_sliders.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                 {{-- links of tabs --}}
                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="true">بيانات الشريحة</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="url-tab" data-toggle="tab" href="#url" role="tab" aria-controls="url" aria-selected="false">Url</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="publish-tab" data-toggle="tab" href="#publish" role="tab" aria-controls="publish" aria-selected="false">بيانات النشر</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">بيانات SEO</a>
                    </li>

                </ul>

                {{-- contents of links tabs  --}}
                <div class="tab-content" id="myTabContent">
                    
                    {{-- Content Tab --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">
                        <div class="row">

                            {{-- البيانات الاساسية --}}
                            <div class="col-md-7 col-sm-12 ">

                                {{-- slider title field --}}
                                <div class="row pt-4">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="title">العنوان</label>
                                            <input type="text" id="title" name="title" value="{{old('title',$slider->title)}}" class="form-control" placeholder="">
                                            @error('title') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- slider content field --}}
                                <div class="row pt-4">
                                    <div class="col-12">
                                        <label for="content">الوصف</label>
                                        <textarea name="content"  rows="10" class="form-control summernote">
                                            {!!old('content',$slider->content)!!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- مرفق الصور  --}}
                            <div class="col-md-5 col-sm-12 ">

                                <div class="row pt-4">
                                    <div class="col-12">
                                        <label for="images">الصورة/ الصور</label>
                                        <br>
                                        <div class="file-loading">
                                            <input type="file" name="images[]" id="slider_images" class="file-input-overview" multiple="multiple">
                                            @error('images')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- url Tab --}}
                    <div class="tab-pane fade" id="url" role="tabpanel" aria-labelledby="url-tab">
                        
                        {{-- url fields --}}
                        <div class="row">
                            {{-- url field --}}
                            <div class="col-md-12 col-sm-12 pt-4">
                                <label for="url">رمز المنتج url</label>
                                <input type="text" name="url" id="url" value="{{old('url',$slider->url)}}" class="form-control" placeholder="">
                                @error('url') <span class="text-danger">{{$message}}</span> @enderror                        
                            </div>
                        </div>

                        {{--  target  fields --}}
                        <div class="row">
                            <div class="col-md-12 col-sm-12 pt-3">
                                <label for="target">السعر المنتج </label>
                                <input type="text" name="target" id="target" value="{{old('target',$slider->target)}}" class="form-control" placeholder="">
                                @error('target') <span class="text-danger">{{$message}}</span> @enderror                        
                            </div>
                        </div>
                    </div>

                    {{-- Publish Tab --}}
                    <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-tab">
                        {{-- status and featured field --}}
                        <div class="row">
                            <div class="col-6 pt-4">
                                <label for="status">الحالة</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status',$slider->status) == '1' ? 'selected' : null}}>مفعل</option>
                                    <option value="0" {{ old('status',$slider->status) == '0' ? 'selected' : null}}>غير مفعل</option>
                                </select>
                                @error('status')<span class="text-danger">{{$message}}</span>@enderror
                            </div>

                            <div class="col-6 pt-4">
                                <label for="featured">عرض في المفضلة</label>
                                <select name="featured" class="form-control">
                                    <option value="1" {{ old('featured',$slider->featured) == '1' ? 'selected' : null}}>نعم</option>
                                    <option value="0" {{ old('featured',$slider->featured) == '0' ? 'selected' : null}}>لا</option>
                                </select>
                                @error('featured')<span class="text-danger">{{$message}}</span>@enderror                       
                            </div>
                        </div>

                        {{-- publish_date publish time field --}}
                        <div class="row">
                            <div class="col-md-6 com-sm-12 pt-4">
                                <label for="publish_date" class="control-label"><span>تاريخ النشر</span><span class="require red">*</span></label>
                                <div class="form-group">
                                    <input type="text" id="publish_date" name="publish_date" value="{{old('publish_date',$slider->publish_date)}}" class="form-control" >
                                    @error('publish_date') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="publish_time" class="control-label"><span>وقت النشر</span><span class="require red">*</span></label>
                                <div class="form-group">
                                    <input type="text" id="publish_time" name="publish_time" value="{{old('publish_time',$slider->publish_time)}}" class="form-control" >
                                    @error('publish_time') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
                        
                        {{-- view_in_main and  tags fields --}}
                        <div class="row ">
                            {{-- view_in_main field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="view_in_main" class="control-label "><span>عرض في الرئيسية</span><span class="require red">*</span></label>
                                <select name="view_in_main" class="form-control">
                                    <option value="1" {{ old('view_in_main',$slider->view_in_main) == '1' ? 'selected' : null}}>مفعل</option>
                                    <option value="0" {{ old('view_in_main',$slider->view_in_main) == '0' ? 'selected' : null}}>غير مفعل</option>
                                </select>
                                @error('view_in_main')<span class="text-danger">{{$message}}</span>@enderror
                            </div>

                            {{-- Tags field  --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="tags">كلمات مفتاحية</label>
                                <select name="tags[]" class="form-control select2" multiple="multiple">
                                    @forelse ($tags as $tag)
                                        <option value="{{$tag->id}}" {{in_array($tag->id , old('tags',$slider->tags->pluck('id')->toArray())) ? 'selected' : null }}  >{{$tag->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                        later work...
                    </div>

                    <div class="form-group pt-4">
                        <button type="submit" name="submit" class="btn btn-primary">تعديل المنتج</button>
                    </div>

                </div>
                

            </form>
        </div>
        
    </div>

@endsection

@section('script')
    {{-- Call select2 plugin --}}
    <script src="{{asset('backend/vendor/select2/js/select2.full.min.js')}}"></script>

    {{-- pickadate calling js --}}
    <script src="{{asset('backend/vendor/datepicker/picker.js')}}"></script>
    <script src="{{asset('backend/vendor/datepicker/picker.date.js')}}"></script>
    <script src="{{asset('backend/vendor/datepicker/picker.time.js')}}"></script>
   
    <script>
        $(function(){
            const link = document.getElementById('checkIn');
            const result = link.hasAttribute('checked');
            if(result){
                document.getElementById('quantity').readOnly =true;
            }
        });
    </script>
    
    <script>
        $(function(){
            
            $("#slider_images").fileinput({
                theme:"fa5",
                maxFileCount: 5 ,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial:false,
                // اضافات للتعامل مع الصورة عند التعديل علي احد اقسام المنتجات
                // delete images from photos and assets/sliders 
                // because there are maybe more than one image we will go for each image and show them in the edit page 
                initialPreview: [
                    @if($slider->photos()->count() > 0)
                        @foreach($slider->photos as $media)
                            "{{ asset('assets/sliders/' . $media->file_name)}}",
                        @endforeach
                    @endif
                ],
                initialPreviewAsData:true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if($slider->photos()->count() > 0)
                        @foreach($slider->photos as $media)
                            { 
                                caption: "{{$media->file_name }}",
                                size: '{{$media->file_size}}' , 
                                width: "120px" , 
                                // url : الراوت المستخدم لحذف الصورة
                                url: "{{route('admin.main_sliders.remove_image' , ['image_id' => $media->id , 'slider_id' => $slider->id , '_token'=> csrf_token()]) }}", 
                                key:{{ $media->id}} 
                            },                        
                        @endforeach
                    @endif
                    
                ]
            }).on('filesorted',function(event,params){
                console.log(params.previewId ,params.oldIndex,params.newIndex,params.stack);
            });

            // ======= start pickadate codeing ===========
            $('#publish_date').pickadate({
                format: 'yyyy-mm-dd',
                selectMonths: true , // Creates a dropdown to control month
                selectYears: true, // creates a dropdown to control years
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close Upon Selecting a date
            });

            $('#offer_ends').pickadate({
                format: 'yyyy-mm-dd',
                selectMonths: true , // Creates a dropdown to control month
                selectYears: true, // creates a dropdown to control years
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close Upon Selecting a date
            });

            var startdate = $('#publish_date').pickadate('picker'); // set startdate in the picker to the start date in the #publish_date elemet
            var enddate = $('#publish_time').pickadate('picker'); 

            var startdate = $('#offer_ends').pickadate('picker'); // set startdate in the picker to the start date in the #publish_date elemet
            var enddate = $('#publish_time').pickadate('picker'); 

            // when change date 
            $('#publish_date').change(function(){
                selected_ci_date = ""; 
                selected_ci_date = $('#publish_date').val(); // make selected start date in picker = publish_date value
                if(selected_ci_date != null){
                    var cidate = new Date(selected_ci_date); // make cidate(start date ) = current date you selected in selected ci date (selected start date )
                    min_codate = "";
                    min_codate = new Date();
                    min_codate.setDate(cidate.getDate()+1); // minimum selected date to be expired shoud be current date plus one 
                    enddate.set('min',min_codate);
                }
            });

            // when change date 
            $('#offer_ends').change(function(){
                selected_ci_date = ""; 
                selected_ci_date = $('#publish_date').val(); // make selected start date in picker = publish_date value
                if(selected_ci_date != null){
                    var cidate = new Date(selected_ci_date); // make cidate(start date ) = current date you selected in selected ci date (selected start date )
                    min_codate = "";
                    min_codate = new Date();
                    min_codate.setDate(cidate.getDate()+1); // minimum selected date to be expired shoud be current date plus one 
                    enddate.set('min',min_codate);
                }

            });


            $('#publish_time').pickatime({
                clear: ''
            });

            $('.summernote').summernote({
                tabSize:2,
                height:200,
                toolbar:[
                    ['style' ,['style']],
                    ['font',['bold','underline','clear']],
                    ['color',['color']],
                    ['para',['ul','ol','paragraph']],
                    ['table',['table']],
                    ['insert',['link','picture','video']],
                    ['view',['fullscreen','codeview','help']]
                ]
            });


             //select2: code to search in data 
             function matchStart(params, data) {
                    // If there are no search terms, return all of the data
                    if ($.trim(params.term) === '') {
                        return data;
                    }

                    // Skip if there is no 'children' property
                    if (typeof data.children === 'undefined') {
                        return null;
                    }

                    // `data.children` contains the actual options that we are matching against
                    var filteredChildren = [];
                    $.each(data.children, function (idx, child) {
                        if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                        filteredChildren.push(child);
                        }
                    });

                    // If we matched any of the timezone group's children, then set the matched children on the group
                    // and return the group object
                    if (filteredChildren.length) {
                        var modifiedData = $.extend({}, data, true);
                        modifiedData.children = filteredChildren;

                        // You can return modified objects from here
                        // This includes matching the `children` how you want in nested data sets
                        return modifiedData;
                    }

                    // Return `null` if the term should not be displayed
                    return null;
            }

            // select2 : .select2 : is  identifier used with element to be effected
            $(".select2").select2({
                tags:true,
                colseOnSelect:false,
                minimumResultsForSearch: Infinity,
                matcher: matchStart
            });

        });
    </script>

  
    
@endsection
