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
                                <h2>{{__('Mã môn học')}}</h2>
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
                                <h2>{{__('Tên môn học')}}</h2>
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
                        <th colspan="5">
                            <a href="{{url('/admin/programs/create')}}"
                               class="btn btn-outline-primary rounded-circle">
                                <i class="fas fa-plus"></i>
                            </a>
                            <a href="#deleted-programs" data-toggle="modal" class="btn btn-outline-danger rounded-circle">
                                <i class="fas fa-trash"></i>
                            </a>
                        </th>
                    </tr>

                    <tr>
                        <th>{{__('Chương trình đào tạo')}}</th>
                        <th>{{__('Hệ đào tạo')}}</th>
                        <th>{{__('Trạng thái')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subject->programs as $program)
                        @if($program->status === 'Đang Mở')
                            <tr>
                                <td>{{$program->name}}</td>
                                <td>{{$program->system}}</td>
                                <td class="@if($program->status === 'Đang Mở') bg-success text-white @endif
                                    d-flex align-items-center justify-content-center"
                                >
                                    {{$program->status}}
                                </td>
                                <td>
                                    <a href="{{url('/admin/programs/edit/id='.$program->id)}}"
                                       class="btn btn-outline-success rounded-circle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a
                                        class="btn btn-outline-danger rounded-circle"
                                        href="{{url('/admin/programs/delete/id='.$program->id)}}"
                                    >
                                        <i class="fas fa-minus"></i>
                                    </a>

                                </td>
                            </tr>
                        @endif

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleted-programs" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Danh Sách Chương Trình Đào Tạo Đã Xóa')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>{{__('Chương trình đào tạo')}}</th>
                                <th>{{__('Hệ đào tạo')}}</th>
                                <th>{{__('Trạng thái')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subject->programs as $program)
                                @if($program->status === 'Đang Đóng')
                                    <tr>
                                        <td>{{$program->name}}</td>
                                        <td>{{$program->system}}</td>
                                        <td class="@if($program->status === 'Đang Đóng') bg-danger text-white @endif
                                            d-flex align-items-center justify-content-center"
                                        >
                                            {{$program->status}}
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/programs/edit/id='.$program->id)}}"
                                               class="btn btn-outline-success rounded-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination justify-content-center"></ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
