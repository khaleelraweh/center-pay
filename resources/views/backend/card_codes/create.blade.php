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
                {{-- direct codes Tab  --}}
                @livewire('backend.card-code.create-direct-code-component')

                {{-- custom codes Tab  --}}
                <div class="tab-pane fade " id="cc_add_custom_codes" role="tabpanel"
                    aria-labelledby="cc_add_custom_codes-tab">

                    @livewire('backend.card-code.create-custom-code-component')

                </div>

                {{-- custom group codes Tab --}}
                <div class="tab-pane fade " id="cc_add_custom_group_codes" role="tabpanel"
                    aria-labelledby="cc_add_custom_group_codes-tab">

                    @livewire('backend.card-code.create-custom-group-code-component')

                </div>



            </div>

        </div>

    </div>
@endsection
