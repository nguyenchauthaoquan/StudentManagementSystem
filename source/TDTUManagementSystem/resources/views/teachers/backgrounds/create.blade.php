@extends('dashboard')


@section('content')

    <div class="container">
        <form method="post" action="{{url('/admin/teachers/backgrounds/add/id='.$teacher->id)}}">
            @csrf
            <div class="row row-header">
                <div class="col-md-12">
                    Backgrounds
                </div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="relationship">Relationship</label>
                            <div>
                                <input type="text" class="form-control" name="relationship" id="relationship">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <div>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <div>
                                <input type="text" class="form-control date-picker" name="birthday" id="birthday">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <div>
                                <input type="text" class="form-control" name="phone" id="phone">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="job">Job</label>
                            <div>
                                <input type="text" class="form-control" name="job" id="job">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="resident">Resident</label>
                            <div>
                                <input type="text" class="form-control" name="resident" id="resident">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="workplace">Workplace</label>
                            <div>
                                <input type="text" class="form-control" name="workplace" id="workplace">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>

@endsection
