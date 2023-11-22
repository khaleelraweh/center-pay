@extends('layouts.admin')
@section('content')

    {{-- main holder page  --}}
    <div class="card shadow mb-4">

        {{-- menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"> تعديل التعليق {{$productReview->name}}</h6>
            <div class="ml-auto">
                <a href="{{route('admin.product_reviews.index')}}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">إدارة التعليقات</span>
                </a>
            </div>
        </div>

        {{-- body part  --}}
        <div class="card-body">
            <form action="{{route('admin.product_reviews.update',$productReview->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-12 col-md-4 pt-4">
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" id="name" name="name" value="{{old('name',$productReview->name)}}" class="form-control" >
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 pt-4">
                        <div class="form-group">
                            <label for="email">الايميل</label>
                            <input type="text" id="email" name="email" value="{{old('email',$productReview->email)}}" class="form-control" >
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 pt-4">
                        <label for="rating">التقييم</label>
                        <select name="rating" class="form-control">
                            <option value="">---</option>
                            <option value="1" {{old('rating',$productReview->rating) == '1' ? 'selected' : null }}>1</option>
                            <option value="2" {{old('rating',$productReview->rating) == '2' ? 'selected' : null }}>2</option>
                            <option value="3" {{old('rating',$productReview->rating) == '3' ? 'selected' : null }}>3</option>
                            <option value="4" {{old('rating',$productReview->rating) == '4' ? 'selected' : null }}>4</option>
                            <option value="5" {{old('rating',$productReview->rating) == '5' ? 'selected' : null }}>5</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4 pt-4">
                        <div class="form-group">
                            <label for="product_id">المنتج</label>
                            <input type="text" id="product_name" name="product_name" value="{{old('product_name',$productReview->product->name)}}" class="form-control" readonly>
                            <input type="hidden" id="product_id" name="product_id" value="{{old('product_id',$productReview->product_id)}}" class="form-control" readonly>
                            @error('product_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 pt-4">
                        <div class="form-group">
                            <label for="user_id">العميل</label>
                            <input type="text" id="user_name" name="user_name" value="{{$productReview->user_id != '' ? $productReview->user->full_name : ''}}" class="form-control" readonly>
                            <input type="hidden" id="user_id" name="user_id" value="{{$productReview->user_id ?? ''}}" class="form-control" readonly>
                            @error('user_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 pt-4">
                        <label for="status">الحالة</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status',$productReview->status) == '1' ? 'selected' : null}}>مفعل</option>
                            <option value="0" {{ old('status',$productReview->status) == '0' ? 'selected' : null}}>غير مفعل</option>
                        </select>
                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 pt-4">
                        <div class="form-group">
                            <label for="title">عوان التعليق</label>
                            <input type="text" id="title" name="title" value="{{old('title',$productReview->title)}}" class="form-control" >
                            @error('title') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 pt-4">
                        <div class="form-group">
                            <label for="message">رسالة التعليق</label>
                            <textarea id="message" name="message"  class="form-control" >
                                {{ old('message',$productReview->message) }}
                            </textarea>
                            @error('message') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                


                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Review</button>
                </div>

            </form>
        </div>
        
    </div>

@endsection


