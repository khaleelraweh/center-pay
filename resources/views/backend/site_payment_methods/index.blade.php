@extends('layouts.admin')

@section('content')
    {{-- main holder page  --}}
    <div class="card shadow mb-4">
        {{--  menu part  --}}
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">تعديل البيانات الاساسية للموقع</h6>
        </div>

        {{-- body part  --}}
        <div class="card-body">

            <form action="{{ route('admin.site_payment_methods.update', 5) }}" method="post">
                @csrf

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab"
                            aria-controls="content" aria-selected="true">بيانات المحتوي</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">


                        @foreach ($site_payment_setting as $key => $value)
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-3">
                                    <div class="form-group">
                                        <label for="{{ $key }}">
                                            الدفع بواسطة {{ explode('_', $key)[2] }} :
                                        </label>
                                        <select name="{{ $key }}" class="form-control">
                                            <option value="1" {{ old($key, $value) == '1' ? 'selected' : null }}>
                                                مفعل
                                            </option>
                                            <option value="0" {{ old($key, $value) == '0' ? 'selected' : null }}>
                                                غير مفعل
                                            </option>
                                        </select>
                                        @error($key)
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror





                                    </div>

                                </div>
                            </div>
                        @endforeach


                    </div>


                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group pt-3 mx-3">
                            <button type="submit" name="submit" class="btn btn-primary">تعديل البيانات</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>
@endsection
