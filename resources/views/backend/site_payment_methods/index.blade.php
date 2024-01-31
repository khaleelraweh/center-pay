@extends('layouts.admin')

@section('content')
    {{-- main holder page  --}}
    <div class="card shadow mb-4">


        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-folder"></i>
                    {{ __('panel.manage_site_settings') }}
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
                        {{ __('panel.show_site_payment_method_icon') }}
                    </li>
                </ul>
            </div>

            <div class="ml-auto d-none">
                @ability('admin', 'create_main_sliders')
                    <a href="{{ route('admin.main_sliders.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus-square"></i>
                        </span>
                        <span class="text">{{ __('panel.add_new_site_payment_method_icon') }}</span>
                    </a>
                @endability
            </div>

        </div>

        {{-- body part  --}}
        <div class="card-body">

            <form action="{{ route('admin.site_payment_methods.update', 5) }}" method="post">
                @csrf

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab"
                            aria-controls="content" aria-selected="true">{{ __('panel.content_tab') }}</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">


                        @foreach ($site_payment_setting as $key => $value)
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-3">
                                    <div class="form-group">
                                        <label for="{{ $key }}">
                                            {{-- {{ $key }} --}}
                                            {{-- الدفع بواسطة {{ explode('_', $key)[2] }} : --}}
                                            {{ __('panel.site_pay_by') }} {{ __('panel.' . $key) }}
                                        </label>
                                        <select name="{{ $key }}" class="form-control">
                                            <option value="1" {{ old($key, $value) == '1' ? 'selected' : null }}>
                                                {{ __('panel.status_active') }}
                                            </option>
                                            <option value="0" {{ old($key, $value) == '0' ? 'selected' : null }}>
                                                {{ __('panel.status_inactive') }}
                                            </option>
                                        </select>
                                        @error($key)
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror





                                    </div>

                                </div>
                            </div>
                        @endforeach


                    </div>


                </div>

                @ability('admin', 'update_site_payment_methods')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group pt-3 mx-3">
                                <button type="submit" name="submit"
                                    class="btn btn-primary">{{ __('panel.update_data') }}</button>
                            </div>
                        </div>
                    </div>
                @endability

            </form>

        </div>

    </div>
@endsection
