@extends('layouts.admin')
@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">تعديل حساب  ( {{$customer->full_name}} ) </h6>
            <div class="ml-auto">
                <a href="{{route('admin.customers.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Customers</span>
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
            <form action="{{route('admin.customers.update',$customer->id)}}" method="post" enctype="multipart/form-data">
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

                            <div class="col-sm-12 col-md-8">

                                <div class="row">
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="first_name">الاسم الاول</label>
                                            <input type="text" id="first_name" name="first_name" value="{{old('first_name', $customer->first_name)}}" class="form-control" placeholder="">
                                            @error('first_name') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="last_name">اللقب</label>
                                            <input type="text" id="last_name" name="last_name" value="{{old('last_name', $customer->last_name)}}" class="form-control" placeholder="">
                                            @error('last_name') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="username">اسم المستخدم</label>
                                            <input type="text" id="username" name="username" value="{{old('username', $customer->username)}}" class="form-control" placeholder="">
                                            @error('username') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="email">الايميل</label>
                                            <input type="text" id="email" name="email" value="{{old('email', $customer->email)}}" class="form-control" placeholder="">
                                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="mobile">رقم الجوال</label>
                                            <input type="text" id="mobile" name="mobile" value="{{old('mobile', $customer->mobile)}}" class="form-control" placeholder="">
                                            @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <div class="form-group">
                                            <label for="password">كلمة المرور</label>
                                            <input type="text" id="password" name="password" value="{{old('password')}}" class="form-control" placeholder="">
                                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 pt-4">
                                        <label for="status">حالة الحسباب</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status', $customer->status) == '1' ? 'selected' : null}}>مفعل</option>
                                            <option value="0" {{ old('status', $customer->status) == '0' ? 'selected' : null}}>مقفل</option>
                                        </select>
                                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-6">
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-4">

                                <div class="row pt-4">
                                    <div class="col-12">
                                        <label for="user_image">صورة الحساب</label>
                                        <br>
                                        <div class="file-loading">
                                            <input type="file" name="user_image" id="customer_image"  class="file-input-overview "  >
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
                        <div class="row pt-4">Later work...</div>
                    </div>

                    <div class="row pt-4">
                        <div class="form-group ">
                            <button type="submit" name="submit" class="btn btn-primary">تعديل الحساب</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
        
    </div>

@endsection

@section('script')
    {{--#user_image is the id in file input file above  --}}
    <script>
        $(function(){
            $("#customer_image").fileinput({
                theme:"fa5",
                maxFileCount: 1 ,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial:false,
                initialPreview: [
                    @if($customer->user_image !='')
                    "{{ asset('assets/users/' . $customer->user_image)}}",
                    @endif
                ],
                initialPreviewAsData:true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                    @if($customer->user_image !='')
                    {
                        caption: "{{$customer->user_image }}",
                        size: '1111' , 
                        width: "120px" , 
                        url: "{{route('admin.customers.remove_image' , ['customer_id'=>$customer->id , '_token'=> csrf_token()]) }}", 
                        key:{{ $customer->id}} 
                    }
                    @endif
                ]
            });
        });
    </script>
    
@endsection
