@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Countries</h6>
            <div class="ml-auto">
                @ability('admin','create_countries')
                <a href="{{route('admin.countries.create')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Add new Country</span>
                </a>
                @endability
            </div>
        </div>

        {{-- filter form part  --}}

        @include('backend.countries.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>States count</th>
                        <th>Status</th>
                        <th class="text-center" style="width:30px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($countries as $country)
                    <tr>
                        <td>{{$country->name}}</td>
                        <td>{{$country->states->count()}}</td>
                        <td>{{$country->status()}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('admin.countries.edit', $country->id)}}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a 
                                    href="javascript:void(0);" 
                                    onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-country-{{$country->id}}').submit();}else{return false;}" 
                                    class="btn btn-danger"
                                >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{route('admin.countries.destroy',$country->id)}}" method="post" class="d-none" id="delete-country-{{$country->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No countrys found</td>
                    </tr>
                @endforelse    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <div class="float-right">
                                {!! $countries->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
