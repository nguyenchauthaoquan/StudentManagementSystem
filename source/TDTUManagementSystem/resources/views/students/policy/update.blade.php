@extends('dashboard')


@section('content')

    <form method="post" action="{{url('/admin/students/policies/update/id='.$policy->id)}}">
        @csrf
        @method('put')
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
                            <input type="text" class="form-control" name="area" id="area" value="{{$policy->area}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">{{__('Chỉnh sửa')}}</button>
                </div>
            </div>
        </div>
    </form>

@endsection
