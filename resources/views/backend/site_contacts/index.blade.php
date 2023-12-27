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

            <form action="{{ route('admin.site_contacts.update', 2) }}" method="post" enctype="multipart/form-data">
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
                                    $site = SiteSetting::where('name', 'site_address')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">العنوان:</label>
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

                            <div class="col-md-6 col-sm-12 pt-3">
                                @php
                                    $site = SiteSetting::where('name', 'site_phone')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">الهاتف:</label>
                                    <input type="text" id="{{ $site->name }}" name="{{ $site->name }}"
                                        value="{{ old($site->name, $site->value) }}" class="form-control"
                                        placeholder="{{ $site->name }}">
                                    @error('{{ $site->name }}')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 pt-3">
                                @php
                                    $site = SiteSetting::where('name', 'site_mobile')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">الموبايل</label>
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

                            <div class="col-md-6 col-sm-12 pt-3">
                                @php
                                    $site = SiteSetting::where('name', 'site_fax')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">الفاكس </label>
                                    <input type="text" id="{{ $site->name }}" name="{{ $site->name }}"
                                        value="{{ old($site->name, $site->value) }}" class="form-control"
                                        placeholder="{{ $site->name }}">
                                    @error('{{ $site->name }}')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 pt-3">
                                @php
                                    $site = SiteSetting::where('name', 'site_po_box')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}">صندوق البريد </label>
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

                            <div class="col-md-6 col-sm-12 pt-3">
                                @php
                                    $site = SiteSetting::where('name', 'site_email1')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}"> البريد الالكتروني:</label>
                                    <input type="text" id="{{ $site->name }}" name="{{ $site->name }}"
                                        value="{{ old($site->name, $site->value) }}" class="form-control"
                                        placeholder="{{ $site->name }}">
                                    @error('{{ $site->name }}')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 pt-3">
                                @php
                                    $site = SiteSetting::where('name', 'site_email2')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}"> البريد الالكتروني البديل:</label>
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
                                    $site = SiteSetting::where('name', 'site_workTime')
                                        ->get()
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="{{ $site->name }}"> مواعيد العمل:</label>
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
