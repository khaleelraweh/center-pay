@extends('layouts.app')




@section('content')
    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('frontend.index') }}">{{ __('panel.main') }}</a></li>
                    <li><a href="{{ route('frontend.cart') }}">{{ __('panel.f_shopping_cart') }}</a></li>
                    <li><span> {{ __('panel.f_complete_your_purchase') }} </span></li>
                </ul>
            </div>
        </div>

        <div class="holder">
            <livewire:frontend.checkout.checkout-component />
        </div>
    </div>
@endsection
