@extends('layouts.admin')
@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">إضافة مقاطعة جديدة</h6>
            <div class="ml-auto">
                <a href="{{route('admin.states.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">إدارة المقاطعات</span>
                </a>
            </div>
        </div>

        {{-- body part  --}}
        <div class="card-body">
            {{-- enctype used cause we will save images  --}}
            <form action="{{route('admin.states.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 pt-4">
                        <div class="form-group">
                            <label for="name">إسم المقاطعة</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 pt-4">
                        <div class="form-group">
                            <label for="name_native">إسم المقاطعة native</label>
                            <input type="text" id="name_native" name="name_native" value="{{old('name_native')}}" class="form-control" placeholder="">
                            @error('name_native') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 pt-4">
                        <label for="country_id">الدولة </label>
                        <select name="country_id" class="form-control">
                            <option value="">---</option>
                            @forelse ($countries as $country)
                            <option value="{{$country->id}}" {{ old('country_id') == $country->id ? 'selected' : null}}>{{$country->name}}</option>
                            @empty   
                            @endforelse
                        </select>
                        @error('country_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="col-sm-12 col-md-6 pt-4">
                        <label for="status">الحالة</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status') == '1' ? 'selected' : null}}>مفعل</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : null}}>غير مفعل</option>
                        </select>
                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>
                {{-- end row --}}
                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">إضافة مقاطعة</button>
                </div>

            </form>
        </div>
        
    </div>

@endsection

