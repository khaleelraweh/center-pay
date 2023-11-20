@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">States</h6>
            <div class="ml-auto">
                @ability('admin','create_states')
                <a href="{{route('admin.states.create')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Add new State</span>
                </a>
                @endability
            </div>
        </div>

        {{-- filter form part  --}}

        @include('backend.states.filter.filter')

        {{-- table part --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Cities Count</th>
                        <th>Country Name</th>
                        <th>Status</th>
                        <th class="text-center" style="width:30px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($states as $state)
                    <tr>
                        <td>{{$state->name}}</td>
                        <td>{{$state->cities->count()}}</td>
                        <td>{{$state->country->name}}</td>
                        <td>{{$state->status()}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('admin.states.edit', $state->id)}}" class="btn btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a 
                                    href="javascript:void(0);" 
                                    onclick=" if( confirm('Are you sure to delete this record?') ){document.getElementById('delete-state-{{$state->id}}').submit();}else{return false;}" 
                                    class="btn btn-danger"
                                >
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <form action="{{route('admin.states.destroy',$state->id)}}" method="post" class="d-none" id="delete-state-{{$state->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No States found</td>
                    </tr>
                @endforelse    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="float-right">
                                {!! $states->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
@endsection
