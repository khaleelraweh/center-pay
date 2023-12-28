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

            <form action="{{ route('admin.site_counters.update', 6) }}" method="post">
                @csrf

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="content-tab" data-toggle="tab" href="#content" role="tab"
                            aria-controls="content" aria-selected="true">بيانات المحتوي</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="content-tab">


                        @foreach ($site_counter_setting as $key => $value)
                            <div class="row">
                                <div class="col-md-12 col-sm-12 pt-3">
                                    <div class="form-group">
                                        <label for="{{ $key }}">
                                            عدد العناصر في
                                            {{ implode(' ', [explode('_', $key)[1], explode('_', $key)[2]]) }} :
                                        </label>

                                        <input type="number" name="{{ $key }}" id="{{ $key }}"
                                            value="{{ old($key, $value) }}" class="form-control" min="1">

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
