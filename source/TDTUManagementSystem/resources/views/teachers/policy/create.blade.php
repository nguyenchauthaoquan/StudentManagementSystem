@extends('dashboard')


@section('content')

    <form method="post" action="{{url('/admin/teachers/policies/add/id='.$teacher->id)}}">
        @csrf
        <div class="container">
            <div class="row row-header">
                <div class="col-md-12">
                    <h5>{{__('Thông tin chính sách')}}</h5>
                </div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md-4">
                        <label for="area">{{__('Diện chính sách')}}</label>
                        <div>
                            <input type="text" class="form-control" name="area" id="area">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="military">{{__('Số năm tham gia nghĩa vụ quân sự')}}</label>
                        <div>
                            <input type="text" class="form-control" name="military" id="military">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="volunteer">{{__('Số năm tham gia tình nguyện')}}</label>
                        <div>
                            <input type="text" class="form-control" name="volunteer" id="volunteer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">{{__('Thêm mới')}}</button>
                </div>
            </div>
        </div>
    </form>

@endsection
