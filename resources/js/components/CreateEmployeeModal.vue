<template>
    <div>
        <button data-toggle="modal" data-target=".addEmpModal" class="float-right btn btn-sm btn-success"><i class="fas fa-plus"></i> Add New Employee</button>
        <!-- Modal -->
        <div class="modal fade addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="saveNewUser">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" v-model="newUser.name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" v-model="newUser.email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Group</label>
                                <select name="group" class="form-control" v-model="newUser.group_id">
                                    <option v-for="group in groups" :key="group.id" :value="group.id">
                                        {{ group.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Profile</label>
                                <select name="profile" class="form-control" v-model="newUser.profile_id">
                                    <option v-for="profile in profiles" :key="profile.id" :value="profile.id">
                                        {{ profile.name }}
                                    </option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateEmployeeModal",
        props: ["newUser","groups","profiles"],
    }
</script>

<style scoped>

</style>
