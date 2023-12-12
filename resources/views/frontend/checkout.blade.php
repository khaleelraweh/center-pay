@extends('layouts.app')

@section('style')
    <style>
        .card.checkout {
            background-color: #23232D;
        }

        .qty-changer input[type='number'],
        .qty-changer input[type='text'] {
            background: transparent;
        }
    </style>
@endsection


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
            @livewire('frontend.checkout-component')
        </div>
    </div>
@endsection
