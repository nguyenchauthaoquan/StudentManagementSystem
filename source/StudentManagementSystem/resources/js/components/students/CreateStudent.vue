<template>
    <div class="container ml-3 mt-3">
        <h1>Add new Student</h1>
        <form v-on:submit.prevent="addStudent()">
            <div class="row row-header">
                <div class="col-md-12">
                    <h5>Basic information</h5>
                </div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="id">ID</label>
                            <div>
                                <input type="text" class="form-control" name="id" id="id" v-model="student.id">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <div>
                                <input type="text" class="form-control" name="firstname" id="firstname" v-model="student.firstname">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="middlename">Middlename</label>
                            <div>
                                <input type="text" class="form-control" name="middlename" id="middlename" v-model="student.middlename">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <div>
                                <input type="text" class="form-control" name="lastname" id="lastname" v-model="student.lastname">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="group">Group</label>
                        <div>
                            <input type="text" class="form-control" id="group" name="group" v-model="student.group">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="major">Major</label>
                        <input type="text" id="major" class="form-control" name="major" v-model="student.major">
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
                        <select name="gender" id="gender" class="form-control" v-model="student.gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="birthday">Birthday</label>
                        <date-picker id="birthday" class="form-control" name="birthday" v-model="student.birthday" :config="options"></date-picker>
                    </div>
                    <div class="col-md">
                        <label for="origin">Origin</label>
                        <input type="text" id="origin" class="form-control" name="origin" v-model="student.origin">
                    </div>
                    <div class="col-md">
                        <label for="id_number">Identity card number</label>
                        <input type="text" id="id_number" class="form-control" name="id_number" v-model="student.id_number">
                    </div>
                    <div class="col-md">
                        <label for="place_of_id_number">Issued by</label>
                        <input type="text" id="place_of_id_number" class="form-control" name="place_of_id_number" v-model="student.place_of_id_number">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <label for="place_of_birth">Place of birth</label>
                        <input type="text" id="place_of_birth" class="form-control" name="place_of_birth" v-model="student.place_of_birth">
                    </div>
                    <div class="col-md-4">
                        <label for="nationality">Nationality</label>
                        <input type="text" id="nationality" class="form-control" name="nationality" v-model="student.nationality">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="religion">Religion</label>
                        <input type="text" id="religion" class="form-control" name="religion" v-model="student.religion">
                    </div>
                    <div class="col-md-2">
                        <label for="kin">Kin</label>
                        <input type="text" id="kin" class="form-control" name="kin" v-model="student.kin">
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
                        <input type="text" id="email" class="form-control" name="email" v-model="student.email">
                    </div>
                    <div class="col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control" name="phone" v-model="student.phone">
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
                        <input type="text" id="address" class="form-control" name="address" v-model="student.address">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="date_of_dormitory">Date of Dormitory</label>
                        <date-picker id="date_of_dormitory" class="form-control" name="date_of_dormitory" v-model="student.date_of_dormitory" :config="options"></date-picker>
                    </div>
                    <div class="col-md-5">
                        <label for="room_of_dormitory">Room of dormitory</label>
                        <input id="room_of_dormitory" class="form-control" name="room_of_dormitory" v-model="student.room_of_dormitory">
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
                        <date-picker id="date_of_union" class="form-control" name="date_of_union" v-model="student.date_of_union" :config="options"></date-picker>
                    </div>
                    <div class="col-md-4">
                        <label for="date_of_communist">Date of Joining Communist</label>
                        <date-picker id="date_of_communist" class="form-control" name="date_of_communist" v-model="student.date_of_communist" :config="options"></date-picker>
                    </div>
                    <div class="col-md-4">
                        <label for="date_of_student_union">Date of Joining the Union of Student</label>
                        <date-picker id="date_of_student_union" class="form-control" name="date_of_student_union" v-model="student.date_of_student_union" :config="options"></date-picker>
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
                        <input type="text" id="talents" class="form-control" name="talents" v-model="student.talents">
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
</template>

<script>
export default {
    data:function () {
        return {
            student: {

            },
            options: {
                format: 'YYYY-MM-DD'
            }
        }
    },
    methods: {
        addStudent() {
            let uri = 'http://127.0.0.1:8000/api/students/create';
            this.axios.post(uri, this.student)
                .then(response => {
                    this.$router.push({name: 'students'});
                });
        }
    }
}
</script>

<style scoped>

</style>
