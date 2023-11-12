@extends('layouts.admin')

@section('style')
    {{-- pickadate calling css --}}
    <link rel="stylesheet" href="{{asset('backend/vendor/datepicker/themes/classic.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendor/datepicker/themes/classic.date.css')}}">

    <style>
        .picker__select--month,.picker__select--year{
            padding: 0 !important;
        }
        .picker__list{
            list-style-type: none;
        }
    </style>
@endsection

@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">إضافة تصينف منتجات</h6>
            <div class="ml-auto">
                <a href="{{route('admin.product_categories.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">تصنيف المنتجات</span>
                </a>
            </div>
        </div>

        {{-- body part  --}}
        <div class="card-body">
            {{-- enctype used cause we will save images  --}}
            <form action="{{route('admin.product_categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">العنوان</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="العنوان..">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="parent_id">تصنيف المنتج</label>
                        <select name="parent_id" class="form-control">
                            <option value="">تصنيف رئيسي__</option>
                            @forelse ($main_categories as $main_category)
                            <option value="{{$main_category->id}}" {{old('parent_id') == $main_category->id ? 'selected' : null }}>{{ $main_category->name }}</option>
                            @empty 
                            @endforelse
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="status">حالة التصنيف</label>
                        <select name="status" class="form-control">
                            <option value="">---</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : null}}>مفعل</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : null}}>غير مفعل</option>
                        </select>
                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                </div>
                
                <div class="row pt-4">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="publish_date">تاريخ النشر </label>
                            <input type="text" id="publish_date" name="publish_date" value="{{old('publish_date')}}" class="form-control" >
                            @error('publish_date') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="publish_time">وقت النشر </label>
                            <input type="text" id="publish_time" name="publish_time" value="{{old('publish_time')}}" class="form-control" >
                            @error('publish_time') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <label for="view_in_main">عرض في الصفحة الرئيسية</label>
                        <select name="view_in_main" class="form-control">
                            <option value="">---</option>
                            <option value="1" {{ old('view_in_main') == '1' ? 'selected' : null}}>مفعل</option>
                            <option value="0" {{ old('view_in_main') == '0' ? 'selected' : null}}>غير مفعل</option>
                        </select>
                        @error('view_in_main')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                </div>

                {{-- description row --}}
                <div class="row pt-4">
                    <div class="col-12">
                        <label for="description">التفاصيل</label>
                        <textarea name="description"  rows="10" class="form-control summernote">
                            {!!old('description')!!}
                        </textarea>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-12">
                        <label for="images">صورة</label>
                        <br>
                        <div class="file-loading">
                            <input type="file" name="images[]" id="category_image" class="file-input-overview ">
                            <span class="form-text text-muted">Image width should be 500px x 500px </span>
                            @error('images')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">حفظ البيانات</button>
                </div>

            </form>
        </div>
        
    </div>

@endsection


@section('script')
    {{-- pickadate calling js --}}

    <script src="{{asset('backend/vendor/datepicker/picker.js')}}"></script>
    <script src="{{asset('backend/vendor/datepicker/picker.date.js')}}"></script>
    <script src="{{asset('backend/vendor/datepicker/picker.time.js')}}"></script>
    <script>
        $(function(){

            //Category image 
            $("#category_image").fileinput({
                theme:"fa5",
                maxFileCount: 1 ,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial:false
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

            var startdate = $('#publish_date').pickadate('picker'); // set startdate in the picker to the start date in the #publish_date elemet
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

            // $('#publish_time').pickadate({
            //     format: 'yyyy-mm-dd',
            //     min: new Date(),
            //     selectMonths: true, // Creates a dropdoen to control month
            //     selectYears: true, // Creates a dropdown to control month 
            //     clear: 'Clear',
            //     close: 'OK',
            //     colseOnSelect: true // Close upon selecting a date ,
            // });
            $('#publish_time').pickatime({
  clear: ''
});

            //summernote for description 
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

        });
    </script>
    
@endsection
