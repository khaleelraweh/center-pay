@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">عارض الشرائح</h6>
            <div class="ml-auto">
                @ability('admin','create_products')
                <a href="{{route('admin.main_sliders.create')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">إضافة شريحة رئيسية جديد</span>
                </a>
                @endability
            </div>
        </div>

        {{-- filter form part  --}}

        @include('backend.main_sliders.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>العنوان</th>
                        {{-- <th>Tags</th> --}}
                        <th>الكاتب</th>
                        <th>تاريخ الانشاء </th>
                        <th>الحالة</th>
                        <th class="text-center" style="width:30px;">الاعدادات</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($sliders as $slider)
                    <tr>

                        {{-- To make code better by making laravel cal only first media using relation shap to low querys --}}
                        <td>
                            @if ($slider->firstMedia)
                                <img src="{{asset('assets/sliders/'.$slider->firstMedia->file_name)}}" width="60" height="60" alt="{{$slider->title}}"> 
                            @else
                                <img src="{{asset('assets/No-Image-Found.png')}}"  width="60" height="60" alt="{{$slider->title}}"> 
                            @endif
                        
                        </td>
                        <td>{{$slider->title}}</td>
                        {{-- <td>{{$slider->tags->pluck('name')->join(',')}}</td> --}}
                        <td>{{$slider->created_by}}</td>
                        <td>{{$slider->created_at}}</td>
                        <td>{{$slider->status()}}</td>
                        <td>
                            
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('admin.main_sliders.edit', $slider->id)}}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i> 
                                </a>
                                <a 
                                    href="javascript:void(0);" 
                                    onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-product-{{$slider->id}}').submit();}else{return false;}" 
                                    class="btn btn-danger"
                                >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{route('admin.main_sliders.destroy',$slider->id)}}" method="post" class="d-none" id="delete-product-{{$slider->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">لم يتم الحصول علي اي شريحة</td>
                    </tr>
                @endforelse    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="float-right">
                                {!! $sliders->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
