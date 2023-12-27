@extends('layouts.admin')
@php
    use App\Models\SiteSetting;
@endphp


@section('style')
    <link rel="stylesheet" href="{{ asset('backend/vendor/tag_meta/tag_meta.css') }}">
    <style>
        .tags-container {
            display: block;
            height: 150px;
            font-size: 18px;
        }

        .tag {
            float: right;
            margin: 5px 5px;
        }
    </style>
@endsection

@section('content')
    {{-- main holder page  --}}
    <div class="card shadow mb-4">
        {{--  menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">تعديل البيانات الاساسية للموقع</h6>
        </div>

        {{-- body part  --}}
        <div class="card-body">

            <form action="{{ route('admin.site_metas.update', 4) }}" method="post">
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
                            <div class="col-md-12 col-sm-12 pt-3">
                                @php
                                    $site = SiteSetting::where('name', 'site_name_meta')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">
                                        اسم المتجر
                                    </label>
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
                                    $site = SiteSetting::where('name', 'site_description_meta')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">
                                        وصف المتجر
                                    </label>
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
                                    $site = SiteSetting::where('name', 'site_link_meta')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">
                                        رابط المتجر
                                    </label>
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
                                    $site = SiteSetting::where('name', 'site_keywords_meta')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="exist-values">
                                        كلمات دلالية
                                    </label>
                                    {{-- <input type="text" id="{{ $site->name }}" name="{{ $site->name }}"
                                        value="{{ old($site->name, $site->value) }}" class="form-control"
                                        placeholder="{{ $site->name }}"> --}}

                                    <input type="text" id="exist-values" class="tagged form-control"
                                        data-removeBtn="true" name="{{ $site->name }}"
                                        value="{{ old($site->name, $site->value) }}" placeholder="ادخل كلمة دلالية" />

                                    @error('exist-values')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
    <script src="{{ asset('backend/vendor/tag_meta/tag_meta.js') }}"></script>
@endsection
