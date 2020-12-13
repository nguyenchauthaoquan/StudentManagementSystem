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
                    </th>
                </tr>
                <tr>
                    <th>{{__('STT')}}</th>
                    <th>{{__('Chương trình đào tạo')}}</th>
                    <th>{{__('Hệ đào tạo')}}</th>
                    <th>{{__('Trạng thái')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                    <tr>
                        <td>{{$program->id}}</td>
                        <td>{{$program->name}}</td>
                        <td>{{$program->system}}</td>
                        <td class="@if($program->status === 'Đóng lại') bg-danger text-white @endif
                                    @if($program->status === 'Đang mở') bg-success text-white @endif
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
                @endforeach

            </tbody>
        </table>
    </div>
    <nav>
        <ul class="pagination justify-content-center"></ul>
    </nav>
@endsection
