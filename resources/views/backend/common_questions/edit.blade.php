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
            <h6 class="m-0 font-weight-bold text-primary">تعديل السؤال الشائع  :   {{$commonQuestion->title}}</h6>
            <div class="ml-auto">
                <a href="{{route('admin.common_questions.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">إدارة الاسئلة الشائعة</span>
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
            <form action="{{route('admin.common_questions.update',$commonQuestion->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- links of tabs --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="true">بيانات الشريحة</a>
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

                        {{-- title --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input type="text" id="title" name="title" value="{{old('title',$commonQuestion->title)}}" class="form-control" >
                                    @error('title') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>

                        {{-- content row --}}
                        <div class="row">
                            <div class="col-12 pt-4">
                                <label for="content">الوصف</label>
                                <textarea name="content"  rows="10" class="form-control summernote">
                                    {!!old('content' , $commonQuestion->content)!!}
                                </textarea>
                            </div>
                        </div>
                            
                    </div>


                    {{-- Publish Tab --}}
                    <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-tab">
                        
                        {{-- published_on and published_on_time  --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="published_on">تاريخ النشر</label>
                                    <input type="text" id="published_on" name="published_on" value="{{old('published_on',\Carbon\Carbon::parse($commonQuestion->published_on)->Format('Y-m-d'))}}" class="form-control" >
                                    @error('published_on') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="published_on_time">وقت النشر</label>
                                    <input type="text" id="published_on_time" name="published_on_time" value="{{old('published_on_time',\Carbon\Carbon::parse($commonQuestion->published_on)->Format('h:i A'))}}" class="form-control" >
                                    @error('published_on_time') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            
                        </div>

                        {{-- status --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <label for="status">الحالة</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status', $commonQuestion->status) == '1' ? 'selected' : null}}>مفعل</option>
                                    <option value="0" {{ old('status', $commonQuestion->status) == '0' ? 'selected' : null}}>غير مفعل</option>
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
                        <button type="submit" name="submit" class="btn btn-primary">إنشاء الكوبون</button>
                    </div>
                </div>

            </form>
        </div>
        
    </div>

@endsection

@section('script')
    {{-- pickadate calling js --}}

    <script src="{{asset('backend/vendor/datepicker/picker.js')}}"></script>
    <script src="{{asset('backend/vendor/datepicker/picker.date.js')}}"></script>
    <script>
        $(function(){

             // ======= start pickadate codeing  for start and end date ===========
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
            // ======= End pickadate codeing for publish start and end date  ===========

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
