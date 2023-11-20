@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{asset('backend/vendor/select2/css/select2.min.css')}}">
    <style>
        .select2-container{
            width: 100% !important;
        }
    </style>
@endsection

@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">تعديل الحساب : ({{$supervisor->full_name}})  </h6>
            <div class="ml-auto">
                <a href="{{route('admin.supervisors.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">إدارة حسابات المشرفين</span>
                </a>
            </div>
        </div>


        {{-- body part  --}}
        <div class="card-body">

             {{-- erorrs show is exists --}}
             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- enctype used cause we will save images  --}}
            <form action="{{route('admin.supervisors.update',$supervisor->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- links of tabs --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="true">بيانات الشريحة</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">بيانات SEO</a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">
                
                    {{-- content tab --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">
                        <div class="row">

                            {{-- main info of supervisor account  --}}
                            <div class="col-sm-12 col-md-8">

                                <div class="row">
                                    <div class="col-sm-12 col-md-6 pt-3">
                                        <div class="form-group">
                                            <label for="first_name">الاسم الاول</label>
                                            <input type="text" id="first_name" name="first_name" value="{{old('first_name',$supervisor->first_name)}}" class="form-control" placeholder="">
                                            @error('first_name') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 pt-3">
                                        <div class="form-group">
                                            <label for="last_name">اللقب</label>
                                            <input type="text" id="last_name" name="last_name" value="{{old('last_name',$supervisor->last_name)}}" class="form-control" placeholder="">
                                            @error('last_name') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6 pt-3">
                                        <div class="form-group">
                                            <label for="username">اسم المستخدم</label>
                                            <input type="text" id="username" name="username" value="{{old('username',$supervisor->username)}}" class="form-control" placeholder="">
                                            @error('username') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 pt-3">
                                        <div class="form-group">
                                            <label for="email">الايميل</label>
                                            <input type="text" id="email" name="email" value="{{old('email',$supervisor->email)}}" class="form-control" placeholder="">
                                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6 pt-3">
                                        <div class="form-group">
                                            <label for="mobile">رقم الجوال</label>
                                            <input type="text" id="mobile" name="mobile" value="{{old('mobile',$supervisor->mobile)}}" class="form-control" placeholder="">
                                            @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                
                                    <div class="col-sm-12 col-md-6 pt-3">
                                        <div class="form-group">
                                            <label for="password">كلمة المرور</label>
                                            <input type="text" id="password" name="password" value="{{old('password')}}" class="form-control" placeholder="">
                                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-12 col-md-6 pt-3">
                                        <label for="status">حالة الحسباب</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status',$supervisor->status) == '1' ? 'selected' : null}}>مفعل</option>
                                            <option value="0" {{ old('status',$supervisor->status) == '0' ? 'selected' : null}}>مقفل</option>
                                        </select>
                                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    
                                </div>

                                {{-- permissions row --}}
                                <div class="row pt-4">
                                    <div class="col-12">
                                        <label for="permissions">Permissions</label>
                                        <select name="permissions[]" class="form-control select2" multiple="multiple">
                                            @forelse ($permissions as $permission)
                                                <option value="{{$permission->id}}"  {{ in_array($permission->id,old('permissions',$supervisorPermissions)) ? 'selected' : null }}>{{$permission->display_name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                            </div>

                            {{-- image of supervisor account --}}
                            <div class="col-sm-12 col-md-4">
                                <div class="row pt-3">
                                    <div class="col-12">
                                        <label for="user_image">Use Image</label>
                                        <br>
                                        <div class="file-loading">
                                            <input type="file" name="user_image" id="supervisor-image"  class="file-input-overview ">
                                            <span class="form-text text-muted">Image width should be 500px x 500px </span>
                                            @error('user_image')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- seo tab  --}}
                    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                        <div class="row pt-3">Later work...</div>
                    </div>

                    <div class="row pt-3">
                        <div class="form-group ">
                            <button type="submit" name="submit" class="btn btn-primary">إضافة حساب</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
        
    </div>

@endsection

@section('script')
    {{-- Call select2 plugin --}}
    <script src="{{asset('backend/vendor/select2/js/select2.full.min.js')}}"></script>
<script>
        //select2: code to search in data 
        function matchStart(params, data) {
                    // If there are no search terms, return all of the data
                    if ($.trim(params.term) === '') {
                        return data;
                    }

                    // Skip if there is no 'children' property
                    if (typeof data.children === 'undefined') {
                        return null;
                    }

                    // `data.children` contains the actual options that we are matching against
                    var filteredChildren = [];
                    $.each(data.children, function (idx, child) {
                        if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                        filteredChildren.push(child);
                        }
                    });

                    // If we matched any of the timezone group's children, then set the matched children on the group
                    // and return the group object
                    if (filteredChildren.length) {
                        var modifiedData = $.extend({}, data, true);
                        modifiedData.children = filteredChildren;

                        // You can return modified objects from here
                        // This includes matching the `children` how you want in nested data sets
                        return modifiedData;
                    }

                    // Return `null` if the term should not be displayed
                    return null;
        }

        // select2 : .select2 : is  identifier used with element to be effected
        $(".select2").select2({
            tags:true,
            colseOnSelect:false,
            minimumResultsForSearch: Infinity,
            matcher: matchStart
        });
        
        
        $(function(){
            $("#supervisor-image").fileinput({
                theme:"fa5",
                maxFileCount: 1 ,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial:false,
                initialPreview: [
                    @if($supervisor->user_image !='')
                    "{{ asset('assets/users/' . $supervisor->user_image)}}",
                    @endif
                ],
                initialPreviewAsData:true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if($supervisor->user_image !='')
                    {
                        caption: "{{$supervisor->user_image }}",
                        size: '1111' , 
                        width: "120px" , 
                        url: "{{route('admin.supervisors.remove_image' , ['supervisor_id'=>$supervisor->id , '_token'=> csrf_token()]) }}", 
                        key:{{ $supervisor->id}} 
                    }
                    @endif
                ]
            });
        });
    </script>
    
@endsection
