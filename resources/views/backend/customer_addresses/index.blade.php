@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">إدارة عناوين العملاء </h6>
            <div class="ml-auto">
                @ability('admin','create_customer_addresses')
                <a href="{{route('admin.customer_addresses.create')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">إضافة عنوان عميل جديد</span>
                </a>
                @endability
            </div>
        </div>

        {{-- filter form part  --}}

        @include('backend.customer_addresses.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>العميل </th>
                        <th>عنوان الموقع</th>
                        <th>Shipping Info</th>
                        <th>الموقع</th>
                        <th>الموقع بالضبط</th>
                        <th>Zip Code</th>
                        <th>PoBox</th>
                        <th class="text-center" style="width:30px;">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($customer_addresses as $address)
                    <tr>
                        <td>
                            <a href="{{route('admin.customers.show',$address->user_id)}}">
                                 {{$address->user->full_name}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.customer_addresses.show',$address->id)}}">{{$address->address_title}}</a>
                            <p class="text-gray-400"><b>{{$address->defaultAddress()}}</b></p> 
                        </td>
                        <td>
                            {{$address->first_name.' '.$address->last_name}}
                            <p class="text-gray-400">{{$address->email}} <br> {{$address->mobile}}</p>
                        </td>
                        <td>{{$address->country->name . '- ' . $address->state->name . ' - ' . $address->city->name}}</td>
                        <td>{{$address->address}}</td>
                        <td>{{$address->zip_code}}</td>
                        <td>{{$address->po_box}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('admin.customer_addresses.edit', $address->id)}}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a 
                                    href="javascript:void(0);" 
                                    onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-address-{{$address->id}}').submit();}else{return false;}" 
                                    class="btn btn-danger"
                                >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{route('admin.customer_addresses.destroy',$address->id)}}" method="post" class="d-none" id="delete-address-{{$address->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No Addresses found</td>
                    </tr>
                @endforelse    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <div class="float-right">
                                {!! $customer_addresses->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
