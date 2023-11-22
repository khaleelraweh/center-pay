@extends('layouts.admin')
@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">إعدادات الحساب</h6>
            <div class="ml-auto">
                {{-- <a href="{{route('admin.customers.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Customers</span>
                </a> --}}
            </div>
        </div>

        {{-- body part  --}}
        <div class="card-body">
            {{-- enctype used cause we will save images  --}}
            <form action="{{route('admin.update_account_settings',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <div class="row ">
                            <div class="col-sm-12 col-md-6 pt-3">
                                <div class="form-group">
                                    <label for="first_name">الاسم الاول</label>
                                    <input type="text" id="first_name" name="first_name" value="{{old('first_name', auth()->user()->first_name)}}" class="form-control">
                                    @error('first_name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 pt-3">
                                <div class="form-group">
                                    <label for="last_name">اللقب</label>
                                    <input type="text" id="last_name" name="last_name" value="{{old('last_name',auth()->user()->last_name)}}" class="form-control">
                                    @error('last_name') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
        
                        <div class="row ">
                            <div class="col-sm-12 col-md-6 pt-3">
                                <div class="form-group">
                                    <label for="username">اسم المستخدم</label>
                                    <input type="text" id="username" name="username" value="{{old('username',auth()->user()->username)}}" class="form-control">
                                    @error('username') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 pt-3">
                                <div class="form-group">
                                    <label for="email">الايميل</label>
                                    <input type="text" id="email" name="email" value="{{old('email',auth()->user()->email)}}" class="form-control">
                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
        
                        <div class="row ">
                            <div class="col-sm-12 col-md-6 pt-3">
                                <div class="form-group">
                                    <label for="mobile">الموبايل</label>
                                    <input type="text" id="mobile" name="mobile" value="{{old('mobile',auth()->user()->mobile)}}" class="form-control">
                                    @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
        
                            <div class="col-sm-12 col-md-6 pt-3">
                                <div class="form-group">
                                    <label for="password">كلمة المرور</label>
                                    <input type="password" id="password" name="password" value="" class="form-control">
                                    @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            {{-- <div class="col-sm-12 col-md-6 pt-3">
                                <div class="form-group">
                                    <label for="password">كلمة المرور</label>
                                    <input type="password" id="password" name="password" value="{{old('password',auth()->user()->password)}}" class="form-control">
                                    @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="row pt-3">
                            <div class="col-12">
                                <label for="user_image">صورة الحساب</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file" name="user_image" id="admin_image" class="file-input-overview ">
                                    <span class="form-text text-muted">Image width should be 300px x 300px </span>
                                    @error('user_image')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">تحديث بيانات الحساب</button>
                </div>

            </form>
        </div>
        
    </div>

@endsection

@section('script')
    {{--#user_image is the id in file input file above  --}}
    <script>
        $(function(){
            $("#admin_image").fileinput({
                theme:"fa5",
                maxFileCount: 1 ,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial:false,
                initialPreview: [
                    @if(auth()->user()->user_image !='')
                    "{{ asset('assets/users/' . auth()->user()->user_image)}}",
                    @endif
                ],
                initialPreviewAsData:true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if(auth()->user()->user_image !='')
                    {
                        caption: "{{auth()->user()->user_image }}",
                        size: '1111' , 
                        width: "120px" , 
                        url: "{{route('admin.remove_image' , ['admin_id'=>auth()->user()->id , '_token'=> csrf_token()]) }}", 
                        key:{{ auth()->user()->id}} 
                    }
                    @endif
                ]
            });
        });
    </script>
    
@endsection