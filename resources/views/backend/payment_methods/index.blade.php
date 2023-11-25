@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">إدارة شركات الدفع</h6>
            <div class="ml-auto">
                @ability('admin','create_payment_methods')
                    <a href="{{route('admin.payment_methods.create')}}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">إضافة شركة دفع جديدة</span>
                    </a>
                @endability 
            </div>
        </div>

        {{-- filter form part  --}}

        @include('backend.payment_methods.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الكود</th>
                        <th>تجريبي</th>
                        <th>الحالة</th>
                        <th>تاريخ الانشاء</th>
                        <th class="text-center" style="width:30px;">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($payment_methods as $payment_method)
                    <tr>
                        <td>    {{  $payment_method->name       }}   </td>
                        <td>    {{  $payment_method->code       }}   </td>
                        <td>    {{  $payment_method->sandbox()  }}   </td>
                        <td>    {{  $payment_method->status()   }}   </td>
                        <td>    {{  $payment_method->created_at }}   </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.payment_methods.edit', $payment_method->id) }}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a 
                                    href="javascript:void(0);" 
                                    onclick=" if( confirm('Are you sure to delete this record?') ){ document.getElementById('delete-payment-method-{{$payment_method->id}}').submit();}else{return false;}" 
                                    class="btn btn-danger"
                                >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{route('admin.payment_methods.destroy',$payment_method->id)}}" method="post" class="d-none" id="delete-payment-method-{{$payment_method->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No payment methods found</td>
                    </tr>
                @endforelse    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="float-right">
                                {!! $payment_methods->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
