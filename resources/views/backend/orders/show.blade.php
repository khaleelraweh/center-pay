@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">مرجع الطلب : ({{ $order->ref_id }})</h6>
            <div class="ml-auto">
                <form action="{{ route('admin.orders.update', $order->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-row align-items-center">
                        <label class="sr-only" for="inlineFormInputGroupOrderStatus">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">حالة الطلب</div>
                            </div>
                            <select name="order_status" style="outline-style:none;" onchange="this.form.submit()"
                                class="form-control">

                                {{-- To show only the option above the option in the order table to move the transaction to the new step  --}}
                                <option value="">إختر الحدث المناسب </option>
                                @foreach ($order_status_array as $key => $value)
                                    <option value="{{ $key }}"> {{ $value }}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex">
            <div class="col-8">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>مرجع الطلب</th>
                                <td>{{ $order->ref_id }}</td>
                                <th>العميل</th>
                                <td><a href="{{ route('admin.customers.show', $order->user_id) }}">
                                        {{ $order->user->full_name }}</a></td>
                            </tr>
                            <tr>
                                {{-- <th>عنوان العميل</th> --}}
                                {{-- <td><a href="{{ route('admin.customer_addresses.show', $order->user_address_id) }}">{{ $order->user_address->address_title }}</a></td> --}}
                                {{-- <th>شركة الشحن</th> --}}
                                {{-- <td>{{ $order->shipping_company->name . '(' . $order->shipping_company->code . ')' }}</td> --}}
                            </tr>
                            <tr>
                                <th>تاريخ الانشاء </th>
                                <td>{{ $order->created_at->format('Y-m-d h:i a') }}</td>
                                <th>حالة الطلب</th>
                                <td>{!! $order->statusWithLabel() !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>المجموع</th>
                                <td>{{ $order->currency() . $order->subtotal }}</td>
                            </tr>
                            <tr>
                                <th>كود الخصم </th>
                                <td>{{ $order->discount_code }}</td>
                            </tr>
                            <tr>
                                <th>قيمة الخصم</th>
                                <td>{{ $order->currency() . $order->discount }}</td>
                            </tr>
                            <tr>
                                <th>خدمة التوصيل</th>
                                <td>{{ $order->currency() . $order->shipping }}</td>
                            </tr>
                            <tr>
                                <th>الضرائب</th>
                                <td>{{ $order->currency() . $order->tax }}</td>
                            </tr>
                            <tr>
                                <th>الاجمالي الكلي</th>
                                <td>{{ $order->currency() . $order->total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">العمليات على الطلب</h6>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>إسم الحدث</th>
                        <th>طريقة الدفع</th>
                        <th>رقم الحدث</th>
                        <th>نتيجة الدفع</th>
                        <th>تاريخ الحدث</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order->transactions  as $transaction)
                        <tr>
                            <td>{{ $transaction->status() }}</td>
                            <td>{{ $transaction->transaction == 0 ? $order->payment_method?->name : null }}</td>
                            <td>{{ $transaction->transaction_number }}</td>
                            <td>{{ $transaction->payment_result }}</td>
                            <td>{{ $transaction->created_at->format('Y-m-d h:i a') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">لم يحدث اي حدث على هذا الطلب </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">التفاصيل</h6>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>اسم المنتج</th>
                        <th>الكمية</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($order->products as $product)
                        <tr>
                            <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a></td>
                            <td>{{ $product->pivot->quantity }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2"> لم يتم طلب اي منتج الي الان </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
