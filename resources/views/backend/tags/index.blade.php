@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">الكلمات المفتاحية</h6>
            <div class="ml-auto">
                @ability('admin','create_tags')
                <a href="{{route('admin.tags.create')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">إضافة كلمة مفتاحية جديدة</span>
                </a>
                @endability
            </div>
        </div>

        {{-- filter form part  --}}

        @include('backend.tags.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>الكلمة المفتاحية</th>
                        <th>الكاتب</th>
                        <th>الحالة</th>
                        <th>تاريخ الانشاء </th>
                        <th class="text-center" style="width:30px;">معالجة</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->created_by}}</td>
                        <td>{{$tag->status()}}</td>
                        <td>{{$tag->created_at}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a 
                                    href="javascript:void(0);" 
                                    onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-tag-{{$tag->id}}').submit();}else{return false;}" 
                                    class="btn btn-danger"
                                >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{route('admin.tags.destroy',$tag->id)}}" method="post" class="d-none" id="delete-tag-{{$tag->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No Tags found</td>
                    </tr>
                @endforelse    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="float-right">
                                {!! $tags->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
