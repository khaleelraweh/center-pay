@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">إدارة شركات الشحن</h6>
            <div class="ml-auto">
                @ability('admin','create_shipping_companies')
                <a href="{{route('admin.shipping_companies.create')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">إضافة شركة شحن</span>
                </a>
                @endability
            </div>
        </div>

        {{-- filter form part  --}}

        @include('backend.shipping_companies.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>Code</th>
                        <th>الوصف</th>
                        <th>التصنيف</th>
                        <th>التكلفة</th>
                        <th>عدد الدول</th>
                        <th>الحالة</th>
                        <th class="text-center" style="width:30px;">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($shipping_companies as $shipping_company)
                    <tr>
                        <td>    {{$shipping_company->name}}             </td>
                        <td>    {{$shipping_company->code}}             </td>
                        <td>    {{$shipping_company->description}}      </td>
                        <td>    {{$shipping_company->fast()}}           </td>
                        <td>    {{$shipping_company->cost}}             </td>
                        <td>    {{$shipping_company->countries_count}}  </td>
                        <td>    {{$shipping_company->status()}}         </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('admin.shipping_companies.edit', $shipping_company->id)}}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a 
                                    href="javascript:void(0);" 
                                    onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-shipping-company-{{$shipping_company->id}}').submit();}else{return false;}" 
                                    class="btn btn-danger"
                                >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{route('admin.shipping_companies.destroy',$shipping_company->id)}}" method="post" class="d-none" id="delete-shipping-company-{{$shipping_company->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No Shipping Companies found</td>
                    </tr>
                @endforelse    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <div class="float-right">
                                {!! $shipping_companies->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
