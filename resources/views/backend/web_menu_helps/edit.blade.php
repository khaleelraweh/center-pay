@extends('layouts.admin')

@section('style')
    {{-- pickadate calling css --}}
    <link rel="stylesheet" href="{{ asset('backend/vendor/datepicker/themes/classic.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/datepicker/themes/classic.date.css') }}">


    <style>
        .picker__select--month,
        .picker__select--year {
            padding: 0 !important;
        }

        .picker__list {
            list-style-type: none;
        }

        .x-title {
            border-bottom: 2px solid #E6E9ED;
            padding: 1px 5px 6px;
            margin-bottom: 10px;
        }

        .require.red {
            color: red;
        }
    </style>
@endsection

@section('content')
    {{-- main holder page  --}}
    <div class="card shadow mb-4">


        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">تعديل محتوي {{ $webMenuHelp->name_ar }}</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.web_menu_helps.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">تصنيف الروابط</span>
                </a>
            </div>
        </div>

        {{-- body part  --}}
        <div class="card-body">
            <form action="{{ route('admin.web_menu_helps.update', $webMenuHelp->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

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

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab"
                            aria-controls="other" aria-selected="false">اخري</a>
                    </li>
                </ul>

                {{-- contents of links tabs  --}}
                <div class="tab-content" id="myTabContent">

                    {{-- تاب بيانات المحتوي --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">


                        {{-- عنوان الرابط عربي  --}}
                        <div class="row pt-4">
                            <label for="name_ar" class="control-label col-md-3 col-sm-12 ">
                                العنوان (عربي):
                                <span class="require red">*</span>
                            </label>
                            <div class="col-md-9 col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="name_ar" name="name_ar"
                                        value="{{ old('name_ar', $webMenuHelp->name_ar) }}" class="form-control"
                                        placeholder="name_ar">
                                    @error('name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- عنوان الرابط أنجليزي  --}}
                        <div class="row pt-4">
                            <label for="name_en" class="control-label col-md-3 col-sm-12 ">
                                العنوان (انجليزي):
                                <span class="require red">*</span>
                            </label>
                            <div class="col-md-9 col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="name_en" name="name_en"
                                        value="{{ old('name_en', $webMenuHelp->name_en) }}" class="form-control"
                                        placeholder="name_en">
                                    @error('name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        {{--  الرابط   --}}
                        <div class="row pt-4">
                            <label for="link" class="control-label col-md-3 col-sm-12 ">
                                الرابط:
                                <span class="require red">*</span>
                            </label>
                            <div class="col-md-9 col-sm-12">
                                <div class="form-group">
                                    <input type="text" id="link" name="link"
                                        value="{{ old('link', $webMenuHelp->link) }}" class="form-control"
                                        placeholder="link">
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div>


                    {{-- تاب بيانات النشر --}}
                    <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-tab">


                        <div class="row">
                            <div class="col-sm-12  pt-4">
                                <div class="form-group">
                                    <label for="published_on">تاريخ النشر</label>
                                    <input type="text" id="published_on" name="published_on"
                                        value="{{ old('published_on', \Carbon\Carbon::parse($webMenuHelp->published_on)->Format('Y-m-d')) }}"
                                        class="form-control">
                                    @error('published_on')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12  pt-4">
                                <div class="form-group">
                                    <label for="published_on_time">وقت النشر</label>
                                    <input type="text" id="published_on_time" name="published_on_time"
                                        value="{{ old('published_on_time', \Carbon\Carbon::parse($webMenuHelp->published_on)->Format('h:i A')) }}"
                                        class="form-control">
                                    @error('published_on_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{-- حالة التصنيف --}}
                        <div class="row ">

                            <div class="col-md-12 col-sm-12 pt-4">
                                <label for="status" class="control-label col-md-3 col-sm-12 ">
                                    <span>الحالة</span>
                                    <span class="require red">*</span>
                                </label>
                                <select name="status" class="form-control">
                                    <option value="">---</option>
                                    <option value="1"
                                        {{ old('status', $webMenuHelp->status) == '1' ? 'selected' : null }}>مفعل
                                    </option>
                                    <option value="0"
                                        {{ old('status', $webMenuHelp->status) == '0' ? 'selected' : null }}>غير مفعل
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    {{-- تاب لاي شي جديد --}}
                    <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                        any think you want
                    </div>

                </div>


                {{-- submit part --}}
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <div class="form-group pt-3 mx-3">
                            <button type="submit" name="submit" class="btn btn-primary">تعديل البيانات</button>
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
                selected_ci_date = now() // make selected start date in picker = start_date value  

            });

            $('#published_on_time').pickatime({
                clear: ''
            });

        });
    </script>
@endsection
