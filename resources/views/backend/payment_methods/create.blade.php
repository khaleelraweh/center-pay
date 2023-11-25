@extends('layouts.admin')

@section('style')
    <style>
        .picker__select--month,.picker__select--year{
            padding: 0 !important;
        }
        .picker__list{
            list-style-type: none;
        }
        .note-editor.note-airframe, .note-editor.note-frame{
            margin-bottom: 0 !important;
        }
    </style>
@endsection

@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">إضافة شركة دفع جديدة</h6>
            <div class="ml-auto">
                <a href="{{route('admin.payment_methods.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">إدارة شركات الدفع</span>
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
            <form action="{{route('admin.payment_methods.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- links of tabs --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="true">البيانات الاساسية</a>
                    </li>

                    <li class="nav-item live" role="presentation">
                        <a class="nav-link" id="live-tab" data-toggle="tab" href="#live" role="tab" aria-controls="live" aria-selected="false">Live</a>
                    </li>

                    <li class="nav-item sandbox" role="presentation">
                        <a class="nav-link" id="sandbox-tab" data-toggle="tab" href="#sandbox" role="tab" aria-controls="sandbox" aria-selected="false">Sandbox</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="publish-tab" data-toggle="tab" href="#publish" role="tab" aria-controls="publish" aria-selected="false">بيانات النشر</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">بيانات SEO</a>
                    </li>

                </ul>

                <div class="tab-content" id="myTabContent">
                    
                    {{-- content tab with image  --}}
                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">

                        <div class="row">
                            
                            {{-- content part  --}}
                            <div class="col-sm-12 col-md-7">

                                <div class="row">
                                    <div class="col-sm-12 col-md-12 pt-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="">
                                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12 pt-4">
                                        <div class="form-group">
                                            <label for="code">Code</label>
                                            <input type="text" id="code" name="code" value="{{old('code')}}" class="form-control" placeholder="">
                                            @error('code') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12 pt-4">
                                        <div class="form-group">
                                            <label for="driver_name">Driver Name</label>
                                            <input type="text" id="driver_name" name="driver_name" value="{{old('driver_name')}}" class="form-control" placeholder="">
                                            @error('driver_name') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">    
                                    <div class="col-sm-12 col-md-12 pt-4">
                                        <label for="sandbox">Sandbox</label>
                                        <select id="mycheck" name="sandbox" class="form-control">
                                            <option value="0" {{ old('sandbox') == '0' ? 'selected' : null}}>Live</option>
                                            <option value="1" {{ old('sandbox') == '1' ? 'selected' : null}}>Sandbox</option>
                                        </select>
                                        @error('sandbox')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                
                                </div>
                            </div>

                            {{-- image part  --}}
                            <div class="col-sm-12 col-md-5">

                                <div class="row">
                                    <div class="col-sm-12 col-md-12 pt-4">
                                        <label for="images">images</label>
                                        <br>
                                        <div class="file-loading">
                                            <input type="file" name="images[]" id="payment_method_images" class="file-input-overview" multiple="multiple">
                                            @error('images')<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>

                    </div>

                    {{-- Live tab  --}}
                    <div class="tab-pane fade" id="live" role="tabpanel" aria-labelledby="live-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="merchant_email">Merchant Email</label>
                                    <input type="text" id="merchant_email" name="merchant_email" value="{{old('merchant_email')}}" class="form-control" placeholder="">
                                    @error('merchant_email') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="merchant_password">Merchant Password</label>
                                    <input type="text" id="merchant_password" name="merchant_password" value="{{old('merchant_password')}}" class="form-control" placeholder="">
                                    @error('merchant_password') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="client_id">Client ID</label>
                                    <input type="text" id="client_id" name="client_id" value="{{old('client_id')}}" class="form-control" placeholder="">
                                    @error('client_id') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
        
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="client_secret">Client Secret </label>
                                    <input type="text" id="client_secret" name="client_secret" value="{{old('client_secret')}}" class="form-control" placeholder="">
                                    @error('client_secret') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="username">User name</label>
                                    <input type="text" id="username" name="username" value="{{old('username')}}" class="form-control" placeholder="">
                                    @error('username') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
        
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="password">user password </label>
                                    <input type="text" id="password" name="password" value="{{old('password')}}" class="form-control" placeholder="">
                                    @error('password') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <div class="form-group">
                                    <label for="signature">Signature</label>
                                    <input type="text" id="signature" name="signature" value="{{old('signature')}}" class="form-control" placeholder="">
                                    @error('signature') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>


                    </div>

                    {{-- sandbox tab  --}} 
                    <div class="tab-pane fade" id="sandbox" role="tabpanel" aria-labelledby="sandbox-tab">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="sandbox_merchant_email">Sandbox Merchant Email</label>
                                    <input type="text" id="sandbox_merchant_email" name="sandbox_merchant_email" value="{{old('sandbox_merchant_email')}}" class="form-control" placeholder="">
                                    @error('sandbox_merchant_email') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="sandbox_merchant_password">Sandbox Merchant password</label>
                                    <input type="text" id="sandbox_merchant_password" name="sandbox_merchant_password" value="{{old('sandbox_merchant_password')}}" class="form-control" placeholder="">
                                    @error('sandbox_merchant_password') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="sandbox_client_id">Sandbox Client ID</label>
                                    <input type="text" id="sandbox_client_id" name="sandbox_client_id" value="{{old('sandbox_client_id')}}" class="form-control" placeholder="">
                                    @error('sandbox_client_id') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
        
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="sandbox_client_secret">Sandbox Client Secret </label>
                                    <input type="text" id="sandbox_client_secret" name="sandbox_client_secret" value="{{old('sandbox_client_secret')}}" class="form-control" placeholder="">
                                    @error('sandbox_client_secret') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
        
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="sandbox_username">Sandbox User Name</label>
                                    <input type="text" id="sandbox_username" name="sandbox_username" value="{{old('sandbox_username')}}" class="form-control" placeholder="">
                                    @error('sandbox_username') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
        
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="sandbox_password">Sandbox User Password </label>
                                    <input type="text" id="sandbox_password" name="sandbox_password" value="{{old('sandbox_password')}}" class="form-control" placeholder="">
                                    @error('sandbox_password') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <div class="form-group">
                                    <label for="sandbox_signature">Sandbox Signature</label>
                                    <input type="text" id="sandbox_signature" name="sandbox_signature" value="{{old('sandbox_signature')}}" class="form-control" placeholder="">
                                    @error('sandbox_signature') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    {{-- Publish Tab without  view in main --}}
                    <div class="tab-pane fade" id="publish" role="tabpanel" aria-labelledby="publish-tab">

                        {{-- publish_start publish time field --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="published_on">تاريخ النشر</label>
                                    <input type="text" id="published_on" name="published_on" value="{{old('published_on')}}" class="form-control" >
                                    @error('published_on') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 pt-4">
                                <div class="form-group">
                                    <label for="published_on_time">وقت النشر</label>
                                    <input type="text" id="published_on_time" name="published_on_time" value="{{old('published_on_time')}}" class="form-control" >
                                    @error('published_on_time') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                           
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 pt-4">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : null}}>Active</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : null}}>Inactive</option>
                                </select>
                                @error('status')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>

                    </div>

                    {{-- seo tab  --}}
                    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                        later work...
                    </div>

                    {{-- submit button  --}}
                    <div class="form-group pt-4">
                        <button type="submit" name="submit" class="btn btn-primary">إضافة شركة الدفع </button>
                    </div>
                </div>
                
            </form>
        </div>
        
    </div>

@endsection

@section('script')
    {{--#category_image is the id in file input file above  --}}
    <script> 
        $(function(){

            $("#payment_method_images").fileinput({
                theme:"fa5",
                maxFileCount: 5 ,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial:false
            });

            // ======= start pickadate codeing ===========
            $('#published_on').pickadate({
                format: 'yyyy-mm-dd',
                min: new Date(),
                selectMonths: true , // Creates a dropdown to control month
                selectYears: true, // creates a dropdown to control years
                clear: 'Clear',
                close: 'OK',
                colseOnSelect: true // Close Upon Selecting a date
            });

            var publishedOn = $('#published_on').pickadate('picker'); // set startdate in the picker to the start date in the #start_date elemet

            // when change date 
            $('#published_on').change(function(){
                selected_ci_date = ""; 
                selected_ci_date = now() // make selected start date in picker = start_date value  

            });

            $('#published_on_time').pickatime({
                clear: ''
            });
            // ======= End pickadate codeing ===========

            


        });
    </script>

     {{-- is related to select permision disable and enable by child class --}}
     <script language="javascript">
        //check for the first time 
        if($('#mycheck').val() == 1){
            $('.live').attr('hidden','true');
        } else {
            $('.live').removeAttr('hidden');
        }

        if($('#mycheck').val() == 0){
            $('.sandbox').attr('hidden','true');
        } else {
            $('.sandbox').removeAttr('hidden');
        }


        //do when change choice 
        $('#mycheck').change(function() {
        
            if($('#mycheck').val() == 1)
                $('.live').attr('hidden','true');
            else{

                $('.live').removeAttr('hidden');
            }

            if($('#mycheck').val() == 0)
                $('.sandbox').attr('hidden','true');
            else{

                $('.sandbox').removeAttr('hidden');
            }
        });

    </script>
    
@endsection
