@extends('dashboard')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Update Group')}}</div>
                    <div class="card-body">
                        <form action="{{url('/admin/groups/update/id='.$group->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">
                                    {{__('Name')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" value="{{$group->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_admission" class="col-md-4 col-form-label">
                                    {{__('Admission Date')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="date_admission" class="form-control date-picker" name="date_admission" value="{{$group->date_admission}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_graduation" class="col-md-4 col-form-label">
                                    {{__('Graduation Date')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="date_graduation" class="form-control date-picker" name="date_graduation" value="{{$group->date_graduation}}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
