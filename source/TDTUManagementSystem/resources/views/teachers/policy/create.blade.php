@extends('dashboard')


@section('content')

    <form method="post" action="{{url('/admin/teachers/policies/add/id='.$teacher->id)}}">
        @csrf
        <div class="container">
            <div class="row row-header">
                <div class="col-md-12">
                    Policies
                </div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md-4">
                        <label for="area">Area</label>
                        <div>
                            <input type="text" class="form-control" name="area" id="area">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="military">Date of military</label>
                        <div>
                            <input type="text" class="form-control" name="military" id="military">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="volunteer">Year of volunteer</label>
                        <div>
                            <input type="text" class="form-control" name="volunteer" id="volunteer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </div>
        </div>
    </form>

@endsection
