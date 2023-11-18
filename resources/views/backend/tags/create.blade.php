@extends('layouts.admin')
@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">إنشاء كلمة مفتاحية</h6>
            <div class="ml-auto">
                <a href="{{route('admin.tags.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">الكلمات المفتاحية</span>
                </a>
            </div>
        </div>

        {{-- body part  --}}
        <div class="card-body">
            {{-- enctype used cause we will save images  --}}
            <form action="{{route('admin.tags.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="name">الكلمة المفتاحية</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="name">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-3">
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
                    <button type="submit" name="submit" class="btn btn-primary">إضافة التاج</button>
                </div>

            </form>
        </div>
        
    </div>

@endsection

@section('script')
    {{--#category_image is the id in file input file above  --}}
    <script>
        $(function(){
            $("#category_image").fileinput({
                theme:"fa5",
                maxFileCount: 1 ,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial:false
            })
        });
    </script>
    
@endsection
