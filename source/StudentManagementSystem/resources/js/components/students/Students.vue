<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="toolbar">
                    <router-link class="add-btn" :to="{name: 'createStudent'}">
                        <i class="fas fa-plus"></i>
                    </router-link>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Fullname</td>
                        <td>Group</td>
                        <td>Created</td>
                        <td>Updated</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="student in students" :key="student.id">
                        <td>
                            <router-link v-bind:to="'/students/id='+student.id">{{student.id}}</router-link>
                        </td>
                        <td>{{student.firstname + ' ' + student.middlename + ' ' + student.lastname}}</td>
                        <td>{{student.group.id}}</td>
                        <td v-if="student.created_at">{{student.created_at}}</td>
                        <td v-if="student.updated_at">{{student.updated_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: null,
            students: []
        }
    },
    created() {
        let uri = 'http://127.0.0.1:8000/api/students';
        this.axios.get(uri).then(response => {
            this.students = response.data;
        });
    },
}
</script>

<style scoped>

</style>
