@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mt-1">
                <div class="card">
                    <div class="card-body bg-primary text-white">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-id-card fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Mã Môn Học')}}</h2>
                                <h5>{{$subject->id}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mt-1">
                <div class="card">
                    <div class="card-body bg-success text-white">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-file-signature fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Tên Môn Học')}}</h2>
                                <h5>
                                    {{$subject->name}}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mt-1">
                <div class="card">
                    <div class="card-body bg-danger text-white">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-book-open fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Khoa')}}</h2>
                                <h5>{{$subject->faculty->name}}</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Chương trình đào tạo')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>{{__('Chương Trình Đào Tạo')}}</th>
                        <th>{{__('Hệ Đào Tạo')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subject->programs as $program)
                        @if($program->status === 'Đang Mở')
                            <tr>
                                <td>{{$program->name}}</td>
                                <td>{{$program->system}}</td>
                            </tr>
                        @endif

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
