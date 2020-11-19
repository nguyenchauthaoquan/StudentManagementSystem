@extends('dashboard')


@section('content')
    <div class="container">
        <form method="post" action="{{url('/admin/students/add')}}">
            @csrf
            <div class="row row-header">
                <div class="col-md-12">
                    <h5>Basic information</h5>
                </div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <div>
                                <input type="text" class="form-control" name="id" id="id">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <div>
                                <input type="text" class="form-control" name="firstname" id="firstname">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="middlename">Middlename</label>
                            <div>
                                <input type="text" class="form-control" name="middlename" id="middlename">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <div>
                                <input type="text" class="form-control" name="lastname" id="lastname">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="group">Group</label>
                        <div>
                            <input type="text" class="form-control" id="group" name="group">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="major">Major</label>
                        <input type="text" id="major" class="form-control" name="major">
                    </div>
                </div>
            </div>
            <div class="row row-header">
                <div class="col-md-12">
                    <h5>Personal Information</h5>
                </div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="birthday">Birthday</label>
                        <input id="birthday" class="form-control date-picker" name="birthday" type="text">
                    </div>
                    <div class="col-md">
                        <label for="origin">Origin</label>
                        <input type="text" id="origin" class="form-control" name="origin">
                    </div>
                    <div class="col-md">
                        <label for="id_number">Identity card number</label>
                        <input type="text" id="id_number" class="form-control" name="id_number">
                    </div>
                    <div class="col-md">
                        <label for="place_of_id_number">Issued by</label>
                        <input type="text" id="place_of_id_number" class="form-control" name="place_of_id_number">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <label for="place_of_birth">Place of birth</label>
                        <input type="text" id="place_of_birth" class="form-control" name="place_of_birth">
                    </div>
                    <div class="col-md-4">
                        <label for="nationality">Nationality</label>
                        <input type="text" id="nationality" class="form-control" name="nationality">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="religion">Religion</label>
                        <input type="text" id="religion" class="form-control" name="religion">
                    </div>
                    <div class="col-md-2">
                        <label for="kin">Kin</label>
                        <input type="text" id="kin" class="form-control" name="kin">
                    </div>
                </div>
            </div>
            <div class="row row-header">
                <div class="col-md-12">
                    <h5>Contact</h5>
                </div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="text" id="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control" name="phone">
                    </div>
                </div>
            </div>
            <div class="row row-header">
                <div class="col-md-12">
                    <h5>Accomodations</h5>
                </div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md-12">
                        <label for="address">Address</label>
                        <input type="text" id="address" class="form-control" name="address">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="date_of_dormitory">Date of Dormitory</label>
                        <input id="date_of_dormitory" class="form-control date-picker" name="date_of_dormitory">
                    </div>
                    <div class="col-md-5">
                        <label for="room_of_dormitory">Room of dormitory</label>
                        <input id="room_of_dormitory" class="form-control" name="room_of_dormitory">
                    </div>
                </div>
            </div>
            <div class="row row-header">
                <div class="col-md-12"><h5>Union and Communist</h5></div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md-4">
                        <label for="date_of_union">Date of Joining Union</label>
                        <input id="date_of_union" class="form-control date-picker" name="date_of_union" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="date_of_communist">Date of Joining Communist</label>
                        <input id="date_of_communist" class="form-control date-picker" name="date_of_communist">
                    </div>
                    <div class="col-md-4">
                        <label for="date_of_student_union">Date of Joining the Union of Student</label>
                        <input id="date_of_student_union" class="form-control date-picker" name="date_of_student_union">
                    </div>
                </div>
            </div>
            <div class="row row-header">
                <div class="col-md-12"><h5>Other Information</h5></div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md-12">
                        <label for="talents">Talents</label>
                        <input type="text" id="talents" class="form-control" name="talents">
                    </div>
                    <div class="col-md-6">
                        <label for="career">Career</label>
                        <input type="text" id="career" class="form-control" name="career">
                    </div>
                    <div class="col-md-6">
                        <label for="incomes">Incomes</label>
                        <input type="text" id="incomes" class="form-control" name="incomes">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-12">
                        <label for="description">Family Background Description</label>
                        <textarea class="form-control" id="description" name="description" rows="12"></textarea>
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
