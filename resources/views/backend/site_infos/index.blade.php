@extends('layouts.admin')
@php
    use App\Models\SiteSetting;
@endphp

@section('content')
    {{-- main holder page  --}}
    <div class="card shadow mb-4">
        {{--  menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">تعديل البيانات الاساسية للموقع</h6>
        </div>

        {{-- body part  --}}
        <div class="card-body">

            <form action="{{ route('admin.site_infos.update', 1) }}" method="post" enctype="multipart/form-data">
                @csrf

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab"
                            aria-controls="content" aria-selected="true">بيانات المحتوي</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">

                        <div class="row">

                            <div class="col-md-7 col-sm-12 ">

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 pt-3">
                                        @php
                                            $site = SiteSetting::where('name', 'site_name')
                                                ->get()
                                                ->first();
                                        @endphp
                                        <div class="form-group">
                                            <label for="{{ $site->name }}">اسم المتجر</label>
                                            <input type="text" id="{{ $site->name }}" name="{{ $site->name }}"
                                                value="{{ old($site->name, $site->value) }}" class="form-control"
                                                placeholder="{{ $site->name }}">
                                            @error('{{ $site->name }}')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 pt-3">
                                        @php
                                            $site = SiteSetting::where('name', 'site_short_name')
                                                ->get()
                                                ->first();
                                        @endphp
                                        <div class="form-group">
                                            <label for="{{ $site->name }}">الاسم المختصر للمتجر</label>
                                            <input type="text" id="{{ $site->name }}" name="{{ $site->name }}"
                                                value="{{ old($site->name, $site->value) }}" class="form-control"
                                                placeholder="{{ $site->name }}">
                                            @error('{{ $site->name }}')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 pt-3">
                                        @php
                                            $site = SiteSetting::where('name', 'site_description')
                                                ->get()
                                                ->first();
                                        @endphp
                                        <div class="form-group">
                                            <label for="{{ $site->name }}">وصف الموقع</label>
                                            <input type="text" id="{{ $site->name }}" name="{{ $site->name }}"
                                                value="{{ old($site->name, $site->value) }}" class="form-control"
                                                placeholder="{{ $site->name }}">
                                            @error('{{ $site->name }}')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12 pt-3">
                                        @php
                                            $site = SiteSetting::where('name', 'site_link')
                                                ->get()
                                                ->first();
                                        @endphp
                                        <div class="form-group">
                                            <label for="{{ $site->name }}">رابط الموقع</label>
                                            <input type="text" id="{{ $site->name }}" name="{{ $site->name }}"
                                                value="{{ old($site->name, $site->value) }}" class="form-control"
                                                placeholder="{{ $site->name }}">
                                            @error('{{ $site->name }}')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-md-5 col-sm-12">
                                @php
                                    $site_image = SiteSetting::where('name', 'site_img')
                                        ->get()
                                        ->first();
                                @endphp




                                <div class="row pt-4">
                                    <div class="col-12">
                                        <label for="site_img">صورة الحساب</label>
                                        <br>
                                        <div class="file-loading">
                                            <input type="file" name="site_img" id="customer_image"
                                                class="file-input-overview ">
                                            <span class="form-text text-muted">Image width should be 500px x 500px </span>
                                            @error('site_img')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>


                </div>

                <div class="row">
                    <div class="col-md-12">
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
    <script>
        $(function() {

            $("#customer_image").fileinput({
                theme: "fa5",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if ($site_image->value != '')
                        "{{ asset('assets/site_settings/' . $site_image->value) }}",
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if ($site_image->value != '')
                        {
                            caption: "{{ $site_image->value }}",
                            size: '1111',
                            width: "120px",
                            url: "{{ route('admin.site_infos.remove_image', ['site_info_id' => $site_image->id, '_token' => csrf_token()]) }}",
                            key: {{ $site_image->id }}
                        }
                    @endif
                ]
            });



        });
    </script>
@endsection
