@extends('layouts.admin')
@section('content')
    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- breadcrumb part  --}}
        <div class="card-header py-3 d-flex justify-content-between">

            <div class="card-naving">
                <h3 class="font-weight-bold text-primary">
                    <i class="fa fa-edit"></i>
                    تعديل كلمة مفتاحية
                </h3>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            الرئيسية
                        </a>
                        <i class="fa fa-solid fa-chevron-left chevron"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.tags.index') }}">
                            الكلمات المفتاحية
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- body part  --}}
        <div class="card-body">
            <form action="{{ route('admin.tags.update', $tag->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="name">الكلمة المفتايحة</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $tag->name) }}"
                                class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="status">الحالة</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $tag->status) == '1' ? 'selected' : null }}>مفعل
                            </option>
                            <option value="0" {{ old('status', $tag->status) == '0' ? 'selected' : null }}>غير مفعل
                            </option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                {{-- end row --}}

                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">تعديل الكلمة المفتاحية</button>
                </div>

            </form>
        </div>

    </div>
@endsection
