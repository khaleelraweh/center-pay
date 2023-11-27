@extends('layouts.admin')

@section('style')
<style>
    .picker__select--month,.picker__select--year{
        padding: 0 !important;
    }
    .picker__list{
        list-style-type: none;
    }
    .note-editor.note-airframe, .note-editor.note-frame{
        margin-bottom: 0 !important;
    }
</style>
    
@endsection

@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">إنشاء عارض شرائح جديد</h6>
            <div class="ml-auto">
                <a href="{{route('admin.main_sliders.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">إدارة عارض الشرائح </span>
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
            <form action="{{route('admin.main_sliders.store')}}" method="post" enctype="multipart/form-data">
                @csrf

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

                <div class="tab-content" id="myTabContent">
                    
                    {{-- Content Tab --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">
                        <div class="row">
                            
                            {{-- البيانات الاساسية --}}
                            <div class="col-md-7 col-sm-12 ">
                
                                {{-- slider title field --}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 pt-4">
                                        <div class="form-group">
                                            <label for="title">العنوان</label>
                                            <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control" placeholder="">
                                            @error('title') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- start date and expired date of the slider use  --}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="start_date">تاريخ البدء</label>
                                            <input type="text" id="start_date" name="start_date" value="{{old('start_date')}}" class="form-control" >
                                            @error('start_date') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="expire_date">تاريخ الانتهاء </label>
                                            <input type="text" id="expire_date" name="expire_date" value="{{old('expire_date')}}" class="form-control" >
                                            @error('expire_date') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- product content field --}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 pt-4">
                                        <label for="content">الوصف</label>
                                        <textarea name="content"  rows="10" class="form-control summernote">
                                            {!!old('content')!!}
                                        </textarea>
                                    </div>
                                </div>

                                
                            </div>

                            {{-- مرفق الصور  --}}
                            <div class="col-md-5 col-sm-12 ">

                                <div class="row">
                                    <div class="col-sm-12 col-md-12 pt-4">
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
                                <input type="text" name="url" id="url" value="{{old('url')}}" class="form-control" placeholder="">
                                @error('url') <span class="text-danger">{{$message}}</span> @enderror                        
                            </div>
                        </div>

                        {{--  target  fields --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4 pt-4">
                                <label for="target">مكان العرض</label>
                                <select name="target" class="form-control">
                                    <option value="_self" {{ old('target') == '1' ? 'selected' : null}}>على نفس الصفحة</option>
                                    <option value="_blanck" {{ old('target') == '0' ? 'selected' : null}}> في صفحة اخرى</option>
                                </select>
                                @error('target')<span class="text-danger">{{$message}}</span>@enderror
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
                                    <option value="1" {{ old('status') == '1' ? 'selected' : null}}>مفعل</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : null}}>غير مفعل</option>
                                </select>
                                @error('status')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-6 pt-4">
                                <label for="featured">عرض في المفضلة</label>
                                <select name="featured" class="form-control">
                                    <option value="1" {{ old('featured') == '1' ? 'selected' : null}}>نعم</option>
                                    <option value="0" {{ old('featured') == '0' ? 'selected' : null}}>لا</option>
                                </select>
                                @error('featured')<span class="text-danger">{{$message}}</span>@enderror                       
                            </div>
                        </div>

                        {{-- publish_start publish time field --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="published_on">تاريخ النشر</label>
                                    <input type="text" id="published_on" name="published_on" value="{{old('published_on')}}" class="form-control" >
                                    @error('published_on') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="published_on_time">وقت النشر</label>
                                    <input type="text" id="published_on_time" name="published_on_time" value="{{old('published_on_time')}}" class="form-control" >
                                    @error('published_on_time') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                           
                        </div>

                      
                        {{-- view_in_main and  tags fields --}}
                        <div class="row ">
                            {{-- view_in_main field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="view_in_main" class="control-label "><span>عرض في الرئيسية</span><span class="require red">*</span></label>
                                <select name="view_in_main" class="form-control">
                                    <option value="1" {{ old('view_in_main') == '1' ? 'selected' : null}}>مفعل</option>
                                    <option value="0" {{ old('view_in_main') == '0' ? 'selected' : null}}>غير مفعل</option>
                                </select>
                                @error('view_in_main')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>

                    </div>

                    {{-- seo tab  --}}
                    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                        later work...
                    </div>



                    <div class="form-group pt-4">
                        <button type="submit" name="submit" class="btn btn-primary">إنشاء الكوبون</button>
                    </div>
                </div>

            </form>
        </div>
        
    </div>

@endsection

@section('script') 
    
    <script>
        $(function(){

            $("#slider_images").fileinput({
                theme:"fa5",
                maxFileCount: 5 ,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial:false
            });

            // This is only for start dant and expire date of slider 
            // ======= start pickadate codeing ===========
            $('#start_date').pickadate({
                format: 'yyyy-mm-dd',
                min: new Date(),
                selectMonths: true , // Creates a dropdown to control month
                selectYears: true, // creates a dropdown to control years
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close Upon Selecting a date
            });

            $('#expire_date').pickadate({
                format: 'yyyy-mm-dd',
                min: new Date(),
                selectMonths: true, // Creates a dropdoen to control month
                selectYears: true, // Creates a dropdown to control month 
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close upon selecting a date ,
            });

            var startdate = $('#start_date').pickadate('picker'); // set startdate in the picker to the start date in the #start_date elemet
            var enddate = $('#expire_date').pickadate('picker'); 

            // when change date 
            $('#start_date').change(function(){
                selected_ci_date = ""; 
                selected_ci_date = $('#start_date').val(); // make selected start date in picker = start_date value
                if(selected_ci_date != null){
                    var cidate = new Date(selected_ci_date); // make cidate(start date ) = current date you selected in selected ci date (selected start date )
                    min_codate = "";
                    min_codate = new Date();
                    min_codate.setDate(cidate.getDate()+1); // minimum selected date to be expired shoud be current date plus one 
                    enddate.set('min',min_codate);
                }

            });

            // This is for publish this slider =========================
            // ======= start pickadate codeing ===========
           
            $('#published_on').pickadate({
                format: 'yyyy-mm-dd',
                min: new Date(),
                selectMonths: true , // Creates a dropdown to control month
                selectYears: true, // creates a dropdown to control years
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close Upon Selecting a date
            });

           
            var publishedOn = $('#published_on').pickadate('picker'); // set startdate in the picker to the start date in the #start_date elemet

            // when change date 
            $('#published_on').change(function(){
                selected_ci_date = ""; 
                selected_ci_date = now() // make selected start date in picker = start_date value  

            });

            $('#published_on_time').pickatime({
                clear: ''
            });
           
            // ======= End pickadate codeing ===========

           

            $('.summernote').summernote({
                tabSize:2,
                height:120,
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


        });
    </script>
    
@endsection
