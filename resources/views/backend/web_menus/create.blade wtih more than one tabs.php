@extends('layouts.admin')

@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">



        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-plus-square"></i>
                    {{ __('panel.add_new_link') }}
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            {{ __('panel.main') }}
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.web_menus.index') }}">
                            {{ __('panel.show_web_menus') }}
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

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach (config('locales.languages') as $key => $val)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->index == 0 ? 'active' : '' }}" id="{{ $key }}-tab"
                                data-bs-toggle="tab" data-bs-target="#{{ $key }}" type="button" role="tab"
                                aria-controls="{{ $key }}"
                                aria-selected="true">{{ __('panel.content_tab') }}({{ $key }})</button>
                        </li>
                    @endforeach

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="published-tab" data-bs-toggle="tab" data-bs-target="#published"
                            type="button" role="tab" aria-controls="published"
                            aria-selected="false">{{ __('panel.published_tab') }}</button>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">

                    @foreach (config('locales.languages') as $key => $val)
                        <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}" id="{{ $key }}"
                            role="tabpanel" aria-labelledby="{{ $key }}-tab">

                            @if ($loop->first)
                                <div class="row">
                                    <div class="col-sm-12 pt-3">
                                        <label for="parent_id" class="control-label">
                                            {{ __('panel.category_menu') }}
                                        </label>
                                        <select name="parent_id" class="form-control">
                                            <option value="">{{ __('panel.main_category') }} __</option>
                                            @forelse ($main_menus as $main_menu)
                                                <option value="{{ $main_menu->id }}"
                                                    {{ old('parent_id') == $main_menu->id ? 'selected' : null }}>
                                                    {{ $main_menu->name_ar }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            @endif


                            <div class="row ">
                                <div class="col-sm-12 pt-3">
                                    <label for="name_ar" class="control-label col-sm-12 ">
                                        {{ __('panel.title') }} ({{ $key }})

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

                            <div class="row ">
                                <div class="col-sm-12 pt-3">
                                    <label for="link" class="control-label col-sm-12 ">
                                        {{ __('panel.link') }}

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
                    @endforeach


                    <div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">

                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-3">
                                <div class="form-group">
                                    <label for="published_on"> {{ __('panel.published_date') }}</label>
                                    <input type="text" id="published_on" name="published_on"
                                        value="{{ old('published_on', now()->format('Y-m-d')) }}" class="form-control">
                                    @error('published_on')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-3">
                                <div class="form-group">
                                    <label for="published_on_time"> {{ __('panel.published_time') }}</label>
                                    <input type="text" id="published_on_time" name="published_on_time"
                                        value="{{ old('published_on_time', now()->format('h:m A')) }}"
                                        class="form-control">
                                    @error('published_on_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12 col-sm-12 pt-3">
                                <label for="status" class="control-label col-md-2 col-sm-12 ">
                                    <span>{{ __('panel.status') }}</span>
                                </label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : null }}>
                                        {{ __('panel.status_active') }}
                                    </option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : null }}>
                                        {{ __('panel.status_inactive') }}
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group pt-3 mx-3">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    {{ __('panel.save_data') }}
                                </button>
                            </div>
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
