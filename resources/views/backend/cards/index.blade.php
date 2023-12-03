@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">البطائق</h6>
            <div class="ml-auto">
                @ability('admin','create_products')
                <a href="{{route('admin.cards.create')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">إضافة بطاقة جديدة</span>
                </a>
                @endability
            </div>
        </div>

        {{-- filter form part  --}}

        @include('backend.cards.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>العنوان</th>
                        <th>الكمية</th>
                        <th>سعر الحبة</th>
                        {{-- <th>Tags</th> --}}
                        <th>الكاتب</th>
                        <th>تاريخ الانشاء </th>
                        <th>عدد المشاهدات </th>
                        <th>الحالة</th>
                        <th class="text-center" style="width:30px;">الاعدادات</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($cards as $card)
                    <tr>

                        {{-- To make code better by making laravel cal only first media using relation shap to low querys --}}
                        <td>
                            @if ($card->firstMedia)
                                {{-- <td><img src="{{asset('assets/cards/'.$card->photos()->first()->file_name)}}" width="60" alt="product Image"> </td> --}}
                                <img src="{{asset('assets/cards/'.$card->firstMedia->file_name)}}" width="60" height="60" alt="{{$card->name}}"> 
                            @else
                                <img src="{{asset('assets/No-Image-Found.png')}}"  width="60" height="60" alt="{{$card->name}}">
                            @endif
                        
                        </td>
                        <td>{{$card->name}}</td>
                        <td>{{$card->quantity}}</td>
                        <td>{{$card->price}}</td>
                        {{-- <td>{{$card->tags->pluck('name')->join(',')}}</td> --}}
                        <td>{{$card->created_by}}</td>
                        <td>{{$card->created_at}}</td>
                        <td>{{$card->views}}</td>
                        <td>{{$card->status()}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('admin.cards.edit', $card->id)}}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a 
                                    href="javascript:void(0);" 
                                    onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-product-{{$card->id}}').submit();}else{return false;}" 
                                    class="btn btn-danger"
                                >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{route('admin.cards.destroy',$card->id)}}" method="post" class="d-none" id="delete-product-{{$card->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No Product cards  found</td>
                    </tr>
                @endforelse    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9">
                            <div class="float-right">
                                {!! $cards->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
