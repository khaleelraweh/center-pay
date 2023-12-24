@extends('layouts.admin')


@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">تصنيف القائمة</h4>

                <div class="page-title-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.web_menus.index') }}">القائمة الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">عرض</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->



    {{-- save is  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                {{-- menu part  --}}
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">تصنيف القائمة </h6>
                    <div class="ml-auto">
                        @ability('admin', 'create_web_menus')
                            <a href="{{ route('admin.web_menus.create') }}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">محتوى جديد</span>
                            </a>
                        @endability
                    </div>
                </div>


                <div class="card-body">

                    {{-- filter form part  --}}
                    @include('backend.web_menus.filter.filter')

                    {{-- table part --}}
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>العنوان</th>
                                    {{-- <th>عدد عناصر القائمة</th> --}}
                                    <th>الكاتب</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th class="text-center" style="width:30px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($menus as $menu)
                                    <tr>
                                        <td>
                                            {{ $menu->name_ar }}
                                            <br>
                                            @if ($menu->parent != null)
                                                <small
                                                    style="background: #17a2b8;color:white;padding:1px 3px;border-radius: 5px; font-size:11px">
                                                    قائمة رئيسية :
                                                    <span>{{ $menu->parent?->name_ar }}</span> </small>
                                            @endif

                                        </td>
                                        {{-- <td>{{ $menu->products_count }}</td> --}}
                                        <td>{{ $menu->created_by }}</td>
                                        <td>
                                            <span
                                                class="btn btn-round  rounded-pill btn-success btn-xs">{{ $menu->status() }}</span>
                                        </td>
                                        <td>{{ $menu->created_at }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.web_menus.edit', $menu->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-product-category-{{ $menu->id }}').submit();}else{return false;}"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <form action="{{ route('admin.web_menus.destroy', $menu->id) }}" method="post"
                                                class="d-none" id="delete-product-category-{{ $menu->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No categories found</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="float-right">
                                        {!! $menus->appends(request()->all())->links() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->





@endsection
