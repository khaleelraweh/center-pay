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
            <h6 class="m-0 font-weight-bold text-primary">إنشاء خبر جديد</h6>
            <div class="ml-auto">
                <a href="{{route('admin.news.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">إدارة الاخبار </span>
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
            <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- links of tabs --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="true">بيانات الخبر</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="publish-tab" data-toggle="tab" href="#publish" role="tab" aria-controls="publish" aria-selected="false">بيانات النشر</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">بيانات SEO</a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">
                    
                    {{-- content tab --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">

                        <div class="row">

                            {{-- content part  --}}
                            <div class="col-sm-12 col-md-7">
                                
                                {{-- name and content content --}}
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 pt-4">
                                        <div class="form-group">
                                            <label for="name">عنوان الخبر</label>
                                            <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" >
                                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- description row --}}
                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <label for="description">وصف الخبر</label>
                                        <textarea name="description"  rows="10" class="form-control summernote">
                                            {!!old('description')!!}
                                        </textarea>
                                    </div>
                                </div>

                            </div>

                             {{-- image part  --}}
                             <div class="col-sm-12 col-md-5">
                                <div class="row pt-4">
                                    <div class="col-12">
                                        <label for="images">الصورة/ الصور</label>
                                        <br>
                                        <div class="file-loading">
                                            <input type="file" name="images[]" id="product_images" class="file-input-overview" multiple="multiple">
                                            @error('images')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                
                             </div>

                        </div>

                    </div>


                    {{-- Publish Tab --}}
                    <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-tab">
                        
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

                        {{-- status--}}
                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <label for="status">الحالة</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : null}}>مفعل</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : null}}>غير مفعل</option>
                                </select>
                                @error('status')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>

                    </div>

                    {{-- seo tab  --}}
                    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                        later work...
                    </div>



                    <div class="form-group pt-4">
                        <button type="submit" name="submit" class="btn btn-primary">إنشاء الخبر</button>
                    </div>
                </div>

            </form>
        </div>
        
    </div>

@endsection

@section('script') 
    
    <script>
        $(function(){

            $("#product_images").fileinput({
                theme:"fa5",
                maxFileCount: 5 ,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial:false
            });


            // This is for publish this coupon =========================
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
