@extends('layouts.admin')

@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">



        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-plus-square"></i>
                    إضفافة رابط جديد
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.web_menus.index') }}">
                            القائمة الرئيسية
                        </a>
                    </li>
                </ul>
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


            <form action="{{ route('admin.web_menus.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- links of tabs --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab"
                            aria-controls="content" aria-selected="true">بيانات المحتوي</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="publish-tab" data-toggle="tab" href="#publish" role="tab"
                            aria-controls="publish" aria-selected="false">بيانات النشر</a>
                    </li>

                </ul>

                {{-- contents of links tabs  --}}
                <div class="tab-content" id="myTabContent">

                    {{-- تاب بيانات المحتوي --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">

                        {{-- تصنيفات القائمة --}}
                        <div class="row">
                            <div class="col-sm-12 Pt-4">
                                <label for="parent_id" class="control-label">
                                    التصنيف
                                    <span class="require red">*</span> :
                                </label>
                                <select name="parent_id" class="form-control">
                                    <option value="">تصنيف رئيسي__</option>
                                    @forelse ($main_menus as $main_menu)
                                        <option value="{{ $main_menu->id }}"
                                            {{ old('parent_id') == $main_menu->id ? 'selected' : null }}>
                                            {{ $main_menu->name_ar }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        {{-- عنوان الرابط عربي  --}}
                        <div class="row ">
                            <div class="col-sm-12 pt-4">
                                <label for="name_ar" class="control-label col-sm-12 ">
                                    العنوان (عربي)
                                    <span class="require red">*</span> :
                                </label>
                                <div class="form-group">
                                    <input type="text" id="name_ar" name="name_ar" value="{{ old('name_ar') }}"
                                        class="form-control">
                                    @error('name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- عنوان الرابط انجليزي  --}}
                        <div class="row ">
                            <div class="col-sm-12 pt-4">
                                <label for="name_en" class="control-label col-sm-12 ">
                                    العنوان (انجليزي)
                                    <span class="require red">*</span> :
                                </label>
                                <div class="form-group">
                                    <input type="text" id="name_en" name="name_en" value="{{ old('name_en') }}"
                                        class="form-control">
                                    @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{--  الرابط --}}
                        <div class="row ">
                            <div class="col-sm-12 pt-4">
                                <label for="link" class="control-label col-sm-12 ">
                                    الرابط
                                    <span class="require red">*</span> :
                                </label>
                                <div class="form-group">
                                    <input type="text" id="link" name="link" value="{{ old('link') }}"
                                        class="form-control">
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- تاب بيانات النشر --}}
                    <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-tab">

                        {{-- publish_start publish time field --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <div class="form-group">
                                    <label for="published_on">تاريخ النشر</label>
                                    <input type="text" id="published_on" name="published_on"
                                        value="{{ old('published_on', now()->format('Y-m-d')) }}" class="form-control">
                                    @error('published_on')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <div class="form-group">
                                    <label for="published_on_time">وقت النشر</label>
                                    <input type="text" id="published_on_time" name="published_on_time"
                                        value="{{ old('published_on_time', now()->format('h:m A')) }}"
                                        class="form-control">
                                    @error('published_on_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        {{-- حالة التصنيف --}}
                        <div class="row">
                            <div class="col-md-12 col-sm-12 pt-4">
                                <label for="status" class="control-label col-md-2 col-sm-12 ">
                                    <span>الحالة</span>
                                    <span class="require red">*</span>
                                </label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : null }}>مفعل</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : null }}>غير مفعل
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                    </div>

                </div>

                {{-- submit part --}}
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group pt-3 mx-3">
                            <button type="submit" name="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>

@endsection


@section('script')
    {{-- pickadate calling js --}}
    <script src="{{ asset('backend/vendor/datepicker/picker.js') }}"></script>
    <script src="{{ asset('backend/vendor/datepicker/picker.date.js') }}"></script>
    <script src="{{ asset('backend/vendor/datepicker/picker.time.js') }}"></script>
    <script>
        $(function() {

            //Category image 
            $("#category_image").fileinput({
                theme: "fa5",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false
            });


            $('#published_on').pickadate({
                format: 'yyyy-mm-dd',
                min: new Date(),
                selectMonths: true, // Creates a dropdown to control month
                selectYears: true, // creates a dropdown to control years
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close Upon Selecting a date
            });


            var publishedOn = $('#published_on').pickadate(
                'picker'); // set startdate in the picker to the start date in the #start_date elemet

            // when change date 
            $('#published_on').change(function() {
                selected_ci_date = "";
                selected_ci_date = $('#published_on').val();
                if (selected_ci_date != null) {
                    var cidate = new Date(selected_ci_date);
                    min_codate = "";
                    min_codate = new Date();
                    min_codate.setDate(cidate.getDate() + 1);
                    enddate.set('min', min_codate);
                }

            });

            $('#published_on_time').pickatime({
                clear: ''
            });



            //summernote for description 
            $('.summernote').summernote({
                tabSize: 2,
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

        });
    </script>
@endsection
