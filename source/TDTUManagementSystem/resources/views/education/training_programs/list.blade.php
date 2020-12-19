@extends('dashboard')


@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th colspan="5">
                        <a href="{{url('/admin/programs/create')}}"
                           class="btn btn-outline-primary rounded-circle">
                            <i class="fas fa-plus"></i>
                        </a>
                        <a href="#deleted" data-toggle="modal" class="btn btn-outline-danger rounded-circle">
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
                @foreach($programs as $program)
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
        <nav>
            <ul class="pagination justify-content-center"></ul>
        </nav>
    </div>
    <div class="modal fade" id="deleted" role="dialog">
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
                            @foreach($programs as $program)
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
