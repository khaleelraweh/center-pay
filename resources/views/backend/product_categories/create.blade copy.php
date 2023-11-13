@extends('layouts.admin')


@section('style')
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
        .require.red{color:red;}
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
            
            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
            @endif





                        <form action="{{ route('admin.product_categories.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="true">English</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="ar-tab" data-toggle="tab" href="#ar" role="tab" aria-controls="ar" aria-selected="false">Arabic</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="ca-tab" data-toggle="tab" href="#ca" role="tab" aria-controls="ca" aria-selected="false">Spanish</a>
                                </li>
                            </ul>



                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="en" role="tabpanel" aria-labelledby="en-tab">

                                    <div class="form-group">
                                        <label for="title">posts.title (en)</label>
                                        <input type="text" name="title[en]" value="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="body">posts.body (en)</label>
                                        <textarea name="body[en]" class="form-control"></textarea>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">

                                    <div class="form-group">
                                        <label for="title">posts.title (ar)</label>
                                        <input type="text" name="title[ar]" value="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="body">posts.body (ar)</label>
                                        <textarea name="body[ar]" class="form-control"></textarea>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="ca" role="tabpanel" aria-labelledby="ca-tab">

                                    <div class="form-group">
                                        <label for="title">posts.title (ca)</label>
                                        <input type="text" name="title[ca]" value="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="body">posts.body (ca)</label>
                                        <textarea name="body[ca]" class="form-control"></textarea>
                                    </div>

                                </div>

                            </div>


                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">{{ __('posts.create_post') }}</button>
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

           
            $('#publish_time').pickatime({
                clear: ''
            });

            //summernote for description 
            $('.summernote').summernote({
                tabSize:2,
                height:100,
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
