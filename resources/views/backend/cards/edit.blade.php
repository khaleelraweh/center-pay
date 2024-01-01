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
                    تعديل باقة : ({{ $card->name }})
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.cards.index') }}">
                            إدارة الباقات
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
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab"
                            aria-controls="content" aria-selected="true">بيانات المحتوي</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pricing-tab" data-toggle="tab" href="#pricing" role="tab"
                            aria-controls="pricing" aria-selected="false">بيانات التسعيرة</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="publish-tab" data-toggle="tab" href="#publish" role="tab"
                            aria-controls="publish" aria-selected="false">بيانات النشر</a>
                    </li>

                </ul>

                {{-- contents of links tabs  --}}
                <div class="tab-content" id="myTabContent">

                    {{-- Content Tab --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">
                        <div class="row">
                            {{-- البيانات الاساسية --}}
                            <div class="col-md-7 col-sm-12 ">

                                {{-- category name  field --}}
                                <div class="row ">
                                    <div class="col-12 pt-4">
                                        <label for="category_id">تصنيف المنتج</label>
                                        <select name="product_category_id" class="form-control">
                                            <option value="">---</option>
                                            @forelse ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('product_category_id', $card->product_category_id) == $category->id ? 'selected' : null }}>
                                                    {{ $category->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                {{-- product name field --}}
                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <div class="form-group">
                                            <label for="name">العنوان</label>
                                            <input type="text" id="name" name="name"
                                                value="{{ old('name', $card->name) }}" class="form-control">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- product description field --}}
                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <label for="description">الوصف</label>
                                        <textarea name="description" rows="10" class="form-control summernote">
                                            {!! old('description', $card->description) !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- مرفق الصور  --}}
                            <div class="col-md-5 col-sm-12 ">

                                <div class="row">
                                    <div class="col-12 pt-4">
                                        <label for="images">الصورة/ الصور</label>
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

                    {{-- Pricing Tab --}}
                    <div class="tab-pane fade" id="pricing" role="tabpanel" aria-labelledby="pricing-tab">
                        {{-- skeu and quantity fields --}}
                        <div class="row">
                            {{-- sku field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="sku">رمز المنتج sku</label>
                                <input type="text" name="sku" id="sku" value="{{ old('sku', $card->sku) }}"
                                    class="form-control">
                                @error('sku')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- quantity field --}}
                            <div class="col-md-6 col-sm-12 pt-4">
                                <label for="quantity">الكمية</label>
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
                                        الكمية غير محدودة
                                    </label>
                                </div>



                            </div>
                        </div>

                        {{-- product price and offer_price fields --}}
                        <div class="row">
                            <div class="col-md-6 col-sm-12 pt-3">
                                <label for="price">السعر المنتج </label>
                                <input type="text" name="price" id="price"
                                    value="{{ old('price', $card->price) }}" class="form-control">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-sm-12 pt-3">
                                <label for="offer_price">سعر التخفيض </label>
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
                                <label for="offer_ends" class="control-label"><span>اخر موعد للتخفيض </span><span
                                        class="require red">*</span></label>
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
                                <label for="max_order">اعلى كمية يمكن طلبها </label>
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
                                        الكمية غير محدودة
                                    </label>
                                </div>



                            </div>
                        </div>
                    </div>

                    {{-- Publish Tab --}}
                    <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-tab">
                        {{-- status and featured field --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <label for="status">الحالة</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status', $card->status) == '1' ? 'selected' : null }}>
                                        مفعل</option>
                                    <option value="0" {{ old('status', $card->status) == '0' ? 'selected' : null }}>
                                        غير مفعل</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12  pt-4">
                                <div class="form-group">
                                    <label for="published_on">تاريخ النشر</label>
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

                            <div class="col-sm-12  pt-4">
                                <div class="form-group">
                                    <label for="published_on_time">وقت النشر</label>
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
                            <div class="col-sm-12 col-md-12 pt-4">
                                <label for="featured">عرض في المفضلة</label>
                                <select name="featured" class="form-control">
                                    <option value="1"
                                        {{ old('featured', $card->featured) == '1' ? 'selected' : null }}>نعم</option>
                                    <option value="0"
                                        {{ old('featured', $card->featured) == '0' ? 'selected' : null }}>لا</option>
                                </select>
                                @error('featured')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                    </div>

                    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                        later work...
                    </div>

                    <div class="form-group pt-4">
                        <button type="submit" name="submit" class="btn btn-primary">تعديل الباقة</button>
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
