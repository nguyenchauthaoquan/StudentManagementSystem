@extends('dashboard')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Add new Group')}}</div>
                    <div class="card-body">
                        <form action="{{url('/admin/groups/add')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="id" class="col-md-4 col-form-label">
                                    {{__('ID')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="id" class="form-control" name="id">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="faculty" class="col-md-4 col-form-label">
                                    {{__('Faculty')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="faculty" class="form-control" name="faculty">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="program_name" class="col-md-4 col-form-label">
                                    {{__('Name of Education Program')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="program_name" class="form-control" name="program_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="program_system" class="col-md-4 col-form-label">
                                    {{__('System of Education Program')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="program_system" class="form-control" name="program_system">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_admission" class="col-md-4 col-form-label">
                                    {{__('Admission Date')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="date_admission" class="form-control date-picker" name="date_admission">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_graduation" class="col-md-4 col-form-label">
                                    {{__('Graduation Date')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="date_graduation" class="form-control date-picker" name="date_graduation">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
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
