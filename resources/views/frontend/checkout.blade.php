@extends('layouts.app')




@section('content')
    <div class="page-content">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('frontend.index') }}">الرئيسية</a></li>
                    <li><span>اكمال عملية الشراء </span></li>
                </ul>
            </div>
        </div>

        <div class="holder">
            <livewire:frontend.checkout.checkout-component />
        </div>
    </div>
@endsection
