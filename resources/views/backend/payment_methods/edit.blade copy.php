@extends('layouts.admin')
@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Edit Payment method ( {{ $payment_method->name }} )</h6>
            <div class="ml-auto">
                <a href="{{route('admin.payment_methods.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Payment Methods</span>
                </a>
            </div>
        </div>

        {{-- body part  --}}
        <div class="card-body">

            <form action="{{route('admin.payment_methods.update',$payment_method->id)}}" method="post">
                @csrf
                @method('PATCH')

                <div class="row">

                    <div class="col-3">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{old('name',$payment_method->name)}}" class="form-control" placeholder="name">
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" id="code" name="code" value="{{old('code',$payment_method->code)}}" class="form-control" placeholder="code..">
                            @error('code') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="driver_name">Driver Name</label>
                            <input type="text" id="driver_name" name="driver_name" value="{{old('driver_name',$payment_method->driver_name)}}" class="form-control" placeholder="driver_name..">
                            @error('driver_name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="col-2">
                        <label for="sandbox">Sandbox</label>
                        <select name="sandbox" class="form-control">
                            <option value="">---</option>
                            <option value="1" {{ old('sandbox',$payment_method->sandbox) == '1' ? 'selected' : null}}>Sandbox</option>
                            <option value="0" {{ old('sandbox',$payment_method->sandbox) == '0' ? 'selected' : null}}>Live</option>
                        </select>
                        @error('sandbox')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="col-1">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="">---</option>
                            <option value="1" {{ old('status',$payment_method->status) == '1' ? 'selected' : null}}>Active</option>
                            <option value="0" {{ old('status',$payment_method->status) == '0' ? 'selected' : null}}>Inactive</option>
                        </select>
                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                </div>

                <div class="row pt-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="merchant_email">Merchant Email</label>
                            <input type="text" id="merchant_email" name="merchant_email" value="{{old('merchant_email',$payment_method->merchant_email)}}" class="form-control" placeholder="merchant email..">
                            @error('merchant_email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row pt-3"> 

                    <div class="col-6">
                        <div class="form-group">
                            <label for="client_id">Client ID</label>
                            <input type="text" id="client_id" name="client_id" value="{{old('client_id',$payment_method->client_id)}}" class="form-control" placeholder="client id ">
                            @error('client_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="client_secret">Client Secret</label>
                            <input type="text" id="client_secret" name="client_secret" value="{{old('client_secret',$payment_method->client_secret)}}" class="form-control" placeholder="client secret">
                            @error('client_secret') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                </div>

                <div class="row pt-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="sandbox_merchant_email">Sandbox Merchant Email</label>
                            <input type="text" id="sandbox_merchant_email" name="sandbox_merchant_email" value="{{old('sandbox_merchant_email',$payment_method->sandbox_merchant_email)}}" class="form-control" placeholder="sandbox merchant email..">
                            @error('sandbox_merchant_email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row pt-3">
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="sandbox_client_id">Sandbox Client ID</label>
                            <input type="text" id="sandbox_client_id" name="sandbox_client_id" value="{{old('sandbox_client_id',$payment_method->sandbox_client_id)}}" class="form-control" placeholder="sandbox client id ">
                            @error('sandbox_client_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="sandbox_client_secret">Sandbox Client Secret </label>
                            <input type="text" id="sandbox_client_secret" name="sandbox_client_secret" value="{{old('sandbox_client_secret',$payment_method->sandbox_client_secret)}}" class="form-control" placeholder="sandbox_client_secret..">
                            @error('sandbox_client_secret') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    
                </div>

                
                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Payment Method</button>
                </div>

            </form>
        </div>
        
    </div>

@endsection


