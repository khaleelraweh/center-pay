@extends('layouts.admin')
@section('content')
    <div class="card_codes shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-folder"></i>
                    {{ __('panel.add_new_card_codes') }}

                </h3>
                {{-- breadcrumb part  --}}
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
                        {{ __('panel.show_card_codes') }}
                    </li>
                </ul>
            </div>
        </div>

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

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="cc_add_direct_codes-tab" data-bs-toggle="tab"
                        data-bs-target="#cc_add_direct_codes" type="button" role="tab"
                        aria-controls="cc_add_direct_codes" aria-selected="true">
                        <i class="fa fa-code"></i>
                        {{ __('panel.cc_add_direct_codes') }}
                    </button>
                </li>


                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="cc_add_custom_codes-tab" data-bs-toggle="tab"
                        data-bs-target="#cc_add_custom_codes" type="button" role="tab"
                        aria-controls="cc_add_custom_codes" aria-selected="false">
                        <i class="fa fa-code"></i>
                        {{ __('panel.cc_add_custom_codes') }}
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="cc_add_custom_group_codes-tab" data-bs-toggle="tab"
                        data-bs-target="#cc_add_custom_group_codes" type="button" role="tab"
                        aria-controls="cc_add_custom_group_codes" aria-selected="false">
                        <i class="fa fa-code"></i>
                        {{ __('panel.cc_add_custom_group_codes') }}
                    </button>
                </li>


            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="cc_add_direct_codes" role="tabpanel"
                    aria-labelledby="cc_add_direct_codes-tab">
                    <form action="{{ route('admin.card_codes.store') }}" method="post">
                        @csrf

                        {{-- card category  field --}}
                        <div class="row pt-3">
                            <div class="col-12 ">
                                <label for="product_category_id">تصنيف البطائق</label>
                                <select name="product_category_id" class="form-control">
                                    <option value="">---</option>
                                    @forelse ($product_categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('product_id') == $category->id ? 'selected' : null }}>
                                            {{ $category->category_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        {{-- card name  field --}}
                        <div class="row pt-3">
                            <div class="col-12 ">
                                <label for="card_id"> البطائق</label>
                                <select name="product_id" class="form-control">
                                    <option value="">---</option>
                                    @forelse ($cards as $card)
                                        <option value="{{ $card->id }}"
                                            {{ old('product_id') == $card->id ? 'selected' : null }}>
                                            {{ $card->product_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        {{-- card codes  --}}
                        <div class="row pt-3">
                            <div class="col-12">
                                <label for="code">إضافة الاكواد</label>
                                <textarea name="code" value="" id="code" style="width:100%;height:300px;"
                                    placeholder="يرجي إدخال الاكواد الخاصة ومن ثم النقر على enter "></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pt-3 ">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        {{ __('panel.save_data') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{-- {{ dd($product_categories) }} --}}
                    </form>
                </div>

                <div class="tab-pane fade " id="cc_add_custom_codes" role="tabpanel"
                    aria-labelledby="cc_add_custom_codes-tab">
                    This is for custom codes
                </div>

                <div class="tab-pane fade " id="cc_add_custom_group_codes" role="tabpanel"
                    aria-labelledby="cc_add_custom_group_codes-tab">
                    This is for custom group codes
                </div>



            </div>





        </div>

    </div>
@endsection
