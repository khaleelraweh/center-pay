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

            <form action="{{ route('admin.site_socials.update', 3) }}" method="post">
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
                                    $site = SiteSetting::where('name', 'site_facebook')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">
                                        facebook <i class="fab fa-facebook"></i>
                                        :
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
                                    $site = SiteSetting::where('name', 'site_twitter')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">
                                        twitter <i class="fab fa-twitter"></i>
                                        :</label>
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
                                    $site = SiteSetting::where('name', 'site_youtube')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">
                                        youtube <i class="fab fa-youtube"></i>
                                        :</label>
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
                                    $site = SiteSetting::where('name', 'site_snapchat')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">
                                        snapchat <i class="fab fa-snapchat"></i>
                                        :</label>
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
                                    $site = SiteSetting::where('name', 'site_instagram')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">
                                        instagram <i class="fab fa-instagram"></i>
                                        :</label>
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
