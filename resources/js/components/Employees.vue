<template>
    <div class="wrapper">
        <nav-bar/>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">

                <div>
                    <h3>User Management</h3>

                </div>
                <div class="card">
                    <div class="card-header">
                        <button data-toggle="modal" data-target=".addEmpModal" class="float-right btn btn-sm btn-success"><i class="fas fa-plus"></i> Add New Employee</button>

                        <!-- Modal -->
                        <div class="modal fade addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
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

                        <div class="row">
                            <div class="col-md-3">
                                <input v-model="filter.search" class="form-control" placeholder="Search">
                            </div>
                            <div class="col-md-2">
                                <input v-model="filter.name" class="form-control" placeholder="user Name">
                            </div>

                            <div class="col-md-2">
                                <select v-model="filter.status" class="form-control">
                                    <option v-for="status in statuses" :value="status.value">{{ status.name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Group</th>
                                <th>Profile</th>
                                <th>status</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="employee in employees" :key="employee.id">
                                <td>{{ employee.name }}</td>
                                <td>{{ employee.email }}</td>
                                <td>{{ employee.group.name }}</td>
                                <td>{{ employee.profile.name }}</td>
                                <td>{{ employee.status }}</td>
                                <td>{{ employee.created_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <side-bar/>

        <footer/>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
</template>

<script>
    import SideBar from "./SideBar";
    import Footer from "./Footer";
    import NavBar from "./NavBar";
    import axios from "axios";

    export default {
        name: "Employees.vue",
        components: {
            NavBar,
            SideBar,
            Footer,
        },
        mounted() {
            this.getEmployeesData();
            this.getGroups();
            this.getProfiles();
        },
        data() {
            return {
                employees: [],
                statuses: [{value: null, name: "all"}, {value: "Active", name: "Active"}, {value: "InActive", name: "InActive"}],
                newUser: {
                    name: "",
                    email: "",
                    group_id: 0,
                    profile_id: 0,
                },
                filter: {
                    search: "",
                    name: "",
                    status: ""
                },
                groups: [],
                profiles: [],
            };
        },

        methods: {
            getEmployeesData() {
                axios.get("/api/employees", {params: this.filter}).then(response => {
                    this.employees = response.data.employees;
                });
            },

            getProfiles() {
                axios.get("/api/groups").then(response => {
                    this.groups = response.data.groups;
                });
            },

            getGroups() {
                axios.get("/api/profiles").then(response => {
                    this.profiles = response.data.profiles;
                });
            },

            saveNewUser() {
                axios.post("/api/employees", this.newUser).then(response => {
                    this.getEmployeesData();
                    alert("user saved successfully");
                    $('.close_modal').click();
                }).catch((error) => {
                    alert("error found , please enter the valid form data");
                    console.log(error)
                });
            }
        },

        watch: {
            filter: {
                handler(newValue, oldValue) {
                    this.getEmployeesData();
                },
                deep: true,
            }
        }
    }
</script>

<style scoped>

</style>
