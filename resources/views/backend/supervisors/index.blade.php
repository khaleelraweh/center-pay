@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">إدارة المشرفين</h6>
            <div class="ml-auto">
                @ability('admin','create_supervisors')
                <a href="{{route('admin.supervisors.create')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">إضافة مشرف جديد</span>
                </a>
                @endability
            </div>
        </div>

        {{-- filter form part  --}}

        @include('backend.supervisors.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>صورة</th>
                        <th>الاسم</th>
                        <th>الايميل & الموبايل</th>
                        <th>الحالة</th>
                        <th>تاريخ الانشاء</th>
                        <th class="text-center" style="width:30px;">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($supervisors as $supervisor)
                    <tr>
                        <td>
                            @if ($supervisor->user_image != '')
                                <img src="{{asset('assets/users/'.$supervisor->user_image)}}" width="60" height="60" alt="{{$supervisor->full_name}}"> 
                            @else
                            <img src="{{asset('assets/users/avatar.svg')}}" width="60" height="60" alt="{{$supervisor->full_name}}"> 
                            @endif
                        </td>
                        <td>
                            {{$supervisor->full_name}}    <br>
                            <strong>{{$supervisor->username}}</strong>
                        
                        </td>
                        <td>
                            {{$supervisor->email}} <br>
                            {{$supervisor->mobile}}
                        </td>
                        <td>{{$supervisor->status()}}</td>
                        <td>{{$supervisor->created_at->format('Y-m-d')}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('admin.supervisors.edit', $supervisor->id)}}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a 
                                    href="javascript:void(0);" 
                                    onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-supervisor-{{$supervisor->id}}').submit();}else{return false;}" 
                                    class="btn btn-danger"
                                >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{route('admin.supervisors.destroy',$supervisor->id)}}" method="post" class="d-none" id="delete-supervisor-{{$supervisor->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No Supervisors found</td>
                    </tr>
                @endforelse    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="float-right">
                                {!! $supervisors->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
