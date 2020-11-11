<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="card-body">
                        <span>{{student.id}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ student.created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="card-body">
                        <span>{{student.firstname + ' ' + student.middlename + ' ' + student.lastname}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ student.created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="card-body">
                        <span>{{ student.group.id }}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ student.created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="card-body">
                        <span>Body</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>Footer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            id: this.$route.params.id,
            student: {}
        }
    },
    created() {
        let uri = 'http://127.0.0.1:8000/api/students/id=' + this.id;
        this.axios.get(uri).then(response => {
            this.student = response.data;
        });
    }
}
</script>

<style scoped>

</style>
