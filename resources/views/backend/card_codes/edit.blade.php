@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('backend/vendor/select2/css/select2.min.css') }}">
    <style>
        .select2-container {
            display: block !important;
        }

        .note-editor.note-airframe,
        .note-editor.note-frame {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">

            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-edit"></i>
                    {{ __('panel.edit_existing_card') }}
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">{{ __('panel.main') }}</a>
                        @if (config('locales.languages')[app()->getLocale()]['rtl_support'] == 'rtl')
                            <i class="fa fa-solid fa-chevron-left chevron"></i>
                        @else
                            <i class="fa fa-solid fa-chevron-right chevron"></i>
                        @endif
                    </li>
                    <li>
                        <a href="{{ route('admin.cards.index') }}">
                            {{ __('panel.show_cards') }}
                        </a>
                    </li>
                </ul>
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
            <form action="{{ route('admin.cards.update', $card->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- links of tabs --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach (config('locales.languages') as $key => $val)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $loop->index == 0 ? 'active' : '' }}" id="{{ $key }}-tab"
                                data-bs-toggle="tab" data-bs-target="#{{ $key }}" type="button" role="tab"
                                aria-controls="{{ $key }}" aria-selected="true">
                                {{ __('panel.content_tab') }}({{ $key }})
                            </button>
                        </li>
                    @endforeach

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="price-tab" data-bs-toggle="tab" data-bs-target="#price" type="button"
                            role="tab" aria-controls="price" aria-selected="true">{{ __('panel.price_tab') }}
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="published-tab" data-bs-toggle="tab" data-bs-target="#published"
                            type="button" role="tab" aria-controls="published"
                            aria-selected="false">{{ __('panel.published_tab') }}
                        </button>
                    </li>

                </ul>

                {{-- contents of links tabs  --}}
                <div class="tab-content" id="myTabContent">

                    {{-- Content Tab --}}
                    @foreach (config('locales.languages') as $key => $val)
                        <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}" id="{{ $key }}"
                            role="tabpanel" aria-labelledby="{{ $key }}">
                            <div class="row">
                                {{-- البيانات الاساسية --}}
                                <div class="{{ $loop->index == 0 ? 'col-md-7' : '' }} col-sm-12 ">

                                    {{-- category name  field --}}
                                    @if ($loop->first)
                                        <div class="row ">
                                            <div class="col-12 pt-4">
                                                <label for="category_id"> {{ __('panel.category_menu') }}</label>
                                                <select name="product_category_id" class="form-control">
                                                    <option value=""> {{ __('panel.main_category') }} __ </option>
                                                    @forelse ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('product_category_id', $card->product_category_id) == $category->id ? 'selected' : null }}>
                                                            {{ $category->category_name }} </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- product name field --}}
                                    <div class="row ">
                                        <div class="col-sm-12 pt-3">
                                            <div class="form-group">
                                                <label for="product_name[{{ $key }}]">
                                                    {{ __('panel.card_name') }}
                                                    {{ __('panel.in') }} {{ __('panel.' . $key) }}
                                                </label>
                                                <input type="text" name="product_name[{{ $key }}]"
                                                    id="product_name[{{ $key }}]"
                                                    value="{{ old('product_name.' . $key, $card->getTranslation('product_name', $key)) }}"
                                                    class="form-control">
                                                @error('product_name.' . $key)
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{--  description field --}}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 pt-4">
                                            <label for="description[{{ $key }}]">
                                                {{ __('panel.description') }}
                                                {{ __('panel.in') }} {{ __('panel.' . $key) }}
                                            </label>
                                            <textarea name="description[{{ $key }}]" rows="10" class="form-control summernote">
                                            {!! old('description.' . $key, $card->getTranslation('description', $key)) !!}
                                        </textarea>
                                            @error('description.' . $key)
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- مرفق الصور  --}}
                                <div class="{{ $loop->index == 0 ? 'col-md-5' : 'd-none' }} col-sm-12 ">

                                    <div class="row">
                                        <div class="col-12 pt-4">
                                            <label for="images">{{ __('panel.image') }}/
                                                {{ __('panel.images') }}</label>
                                            <br>
                                            <div class="file-loading">
                                                <input type="file" name="images[]" id="product_images"
                                                    class="file-input-overview" multiple="multiple">
                                                @error('images')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- price Tab --}}
                    <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">
                        {{-- skeu and quantity fields --}}
                        <div class="row">
                            {{-- sku field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="sku"> {{ __('panel.sku') }} </label>
                                <input type="text" name="sku" id="sku"
                                    value="{{ old('sku', $card->sku) }}" class="form-control">
                                @error('sku')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- quantity field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="quantity">{{ __('panel.qty') }} </label>
                                <input type="number" name="quantity" id="quantity"
                                    value="{{ old('quantity', $card->quantity == -1 ? '' : $card->quantity) }}"
                                    min="0" class="form-control child">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {{-- child class is used to make disabled and enabled to select part --}}
                                <div class="col-md-12 col-sm-12 ">
                                    <label class="col-form-label col-md-12 col-sm-12 ">
                                        <input class='child' type='checkbox' name="Quantity_Unlimited"
                                            id="Quantity_Unlimited" value="-1"
                                            {{ old('Quantity_Unlimited') || $card->quantity == -1 ? 'checked' : '' }} />
                                        {{ __('panel.qty_not_limited') }} </label>
                                </div>



                            </div>
                        </div>

                        {{-- product price and offer_price fields --}}
                        <div class="row">
                            <div class="col-md-6 col-sm-12 pt-3">
                                <label for="price"> {{ __('panel.price') }} </label>
                                <input type="text" name="price" id="price"
                                    value="{{ old('price', $card->price) }}" class="form-control">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-sm-12 pt-3">
                                <label for="offer_price"> {{ __('panel.offer_price') }} </label>
                                <input type="text" id="offer_price" name="offer_price"
                                    value="{{ old('offer_price', $card->offer_price) }}" class="form-control">
                                @error('offer_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- offer_ends for price --}}
                        <div class="row">
                            <div class="col-md-6 com-sm-12 pt-4">
                                <label for="offer_ends" class="control-label"><span> {{ __('panel.offer_ends') }}
                                    </span><span class="require red">*</span></label>
                                <div class="form-group">
                                    <input type="text" id="offer_ends" name="offer_ends"
                                        value="{{ old('offer_ends', $card->offer_ends) }}" class="form-control">
                                    @error('offer_ends')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                            {{-- max quentify accepted field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="max_order"> {{ __('panel.max_order') }} </label>
                                <input type="number" name="max_order" id="max_order"
                                    value="{{ old('max_order', $card->max_order == -1 ? '' : $card->max_order) }}"
                                    min="0" class="form-control child2">
                                @error('max_order')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                {{-- child class is used to make disabled and enabled to select part --}}
                                <div class="col-md-12 col-sm-12 ">
                                    <label class="col-form-label col-md-12 col-sm-12 ">
                                        <input class='child2' type='checkbox' name="Quantity_Unlimited_max_order"
                                            id="Quantity_Unlimited_max_order" value="-1"
                                            {{ old('Quantity_Unlimited_max_order') | ($card->max_order == -1) ? 'checked' : '' }} />
                                        {{ __('panel.qty_not_limited') }} </label>
                                </div>



                            </div>
                        </div>
                    </div>

                    {{-- Published Tab --}}
                    <div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">

                        {{-- published_on and published_on_time  --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <div class="form-group">
                                    <label for="published_on"> {{ __('panel.published_date') }}</label>
                                    <input type="text" id="published_on" name="published_on"
                                        value="{{ old('published_on', \Carbon\Carbon::parse($card->published_on)->Format('Y-m-d')) }}"
                                        class="form-control">
                                    @error('published_on')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <div class="form-group">
                                    <label for="published_on_time">{{ __('panel.published_time') }}</label>
                                    <input type="text" id="published_on_time" name="published_on_time"
                                        value="{{ old('published_on_time', \Carbon\Carbon::parse($card->published_on)->Format('h:i A')) }}"
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
                                    <option value="1" {{ old('status', $card->status) == '1' ? 'selected' : null }}>
                                        {{ __('panel.status_active') }}
                                    </option>
                                    <option value="0" {{ old('status', $card->status) == '0' ? 'selected' : null }}>
                                        {{ __('panel.status_inactive') }}
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- featured field --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <label for="featured">{{ __('panel.featured') }}</label>
                                <select name="featured" class="form-control">
                                    <option value="1"
                                        {{ old('featured', $card->featured) == '1' ? 'selected' : null }}>
                                        {{ __('panel.yes') }}
                                    </option>
                                    <option value="0"
                                        {{ old('featured', $card->featured) == '0' ? 'selected' : null }}>
                                        {{ __('panel.no') }}
                                    </option>
                                </select>
                                @error('featured')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group pt-4">
                        <button type="submit" name="submit" class="btn btn-primary">
                            {{ __('panel.update_data') }}
                        </button>
                    </div>





                </div>

            </form>
        </div>

    </div>

@endsection

@section('script')
    {{-- Call select2 plugin --}}
    <script src="{{ asset('backend/vendor/select2/js/select2.full.min.js') }}"></script>

    {{-- pickadate calling js --}}
    <script src="{{ asset('backend/vendor/datepicker/picker.js') }}"></script>
    <script src="{{ asset('backend/vendor/datepicker/picker.date.js') }}"></script>
    <script src="{{ asset('backend/vendor/datepicker/picker.time.js') }}"></script>

    <script>
        $(function() {
            const link = document.getElementById('checkIn');
            const result = link.hasAttribute('checked');
            if (result) {
                document.getElementById('quantity').readOnly = true;
            }
        });
    </script>

    <script>
        $(function() {

            $("#product_images").fileinput({
                theme: "fa5",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                // اضافات للتعامل مع الصورة عند التعديل علي احد اقسام المنتجات
                // delete images from photos and assets/products 
                // because there are maybe more than one image we will go for each image and show them in the edit page 
                initialPreview: [
                    @if ($card->photos()->count() > 0)
                        @foreach ($card->photos as $media)
                            "{{ asset('assets/cards/' . $media->file_name) }}",
                        @endforeach
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if ($card->photos()->count() > 0)
                        @foreach ($card->photos as $media)
                            {
                                caption: "{{ $media->file_name }}",
                                size: '{{ $media->file_size }}',
                                width: "120px",
                                // url : الراوت المستخدم لحذف الصورة
                                url: "{{ route('admin.cards.remove_image', ['image_id' => $media->id, 'product_id' => $card->id, '_token' => csrf_token()]) }}",
                                key: {{ $media->id }}
                            },
                        @endforeach
                    @endif

                ]
            }).on('filesorted', function(event, params) {
                console.log(params.previewId, params.oldIndex, params.newIndex, params.stack);
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
            $('#published_on').change(function() {
                selected_ci_date = "";
                selected_ci_date = now() // make selected start date in picker = start_date value  

            });

            $('#published_on_time').pickatime({
                clear: ''
            });



            $('#offer_ends').pickadate({
                format: 'yyyy-mm-dd',
                selectMonths: true, // Creates a dropdown to control month
                selectYears: true, // creates a dropdown to control years
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close Upon Selecting a date
            });

            var startdate = $('#offer_ends').pickadate(
                'picker'); // set startdate in the picker to the start date in the #publish_date elemet


            // when change date 
            $('#offer_ends').change(function() {
                selected_ci_date = "";
                selected_ci_date = $('#publish_date')
                    .val(); // make selected start date in picker = publish_date value
                if (selected_ci_date != null) {
                    var cidate = new Date(
                        selected_ci_date
                    ); // make cidate(start date ) = current date you selected in selected ci date (selected start date )
                    min_codate = "";
                    min_codate = new Date();
                    min_codate.setDate(cidate.getDate() +
                        1); // minimum selected date to be expired shoud be current date plus one 
                    enddate.set('min', min_codate);
                }

            });

            $('.summernote').summernote({
                tabSize: 2,
                height: 200,
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
                $.each(data.children, function(idx, child) {
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
                tags: true,
                colseOnSelect: false,
                minimumResultsForSearch: Infinity,
                matcher: matchStart
            });

        });
    </script>

    {{-- is related to select permision disable and enable by child class --}}
    <script language="javascript">
        var $cbox = $('.child').change(function() {
            if (this.checked) {
                $cbox.not(this).attr('disabled', 'disabled');
            } else {
                $cbox.removeAttr('disabled');
            }
        });

        var $cbox2 = $('.child2').change(function() {
            if (this.checked) {
                $cbox2.not(this).attr('disabled', 'disabled');
            } else {
                $cbox2.removeAttr('disabled');
            }
        });
    </script>


    <script>
        $(document).ready(function() {

            if ($("#Quantity_Unlimited").attr("checked"))
                $("#quantity").attr('disabled', 'disabled');
            else
                $("#quantity").removeAttr('disabled');


            if ($("#Quantity_Unlimited_max_order").attr("checked"))
                $("#max_order").attr('disabled', 'disabled');
            else
                $("#max_order").removeAttr('disabled');
        });
    </script>
@endsection
