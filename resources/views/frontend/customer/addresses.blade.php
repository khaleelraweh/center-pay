@extends('layouts.app')
@section('content')
    <section class="py-5 pref">
        <div class="container ">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h4 text-uppercase mb-0"> عنوان العميل {{ auth()->user()->full_name }}</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="pref breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('customer.addresses') }}">العناوين</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="row">

            <div class="col-lg-8 pref">
                <div class="container">
                    <livewire:frontend.customer.addresses-component />
                </div>

            </div>


            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                @include('partial.frontend.customer.sidebar')
            </div>
        </div>
    </section>
@endsection
