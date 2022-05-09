<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <span class="brand-link">
        <a href="#" class="text-decoration-none text-white">

        <span class="brand-text font-weight-light">Employees</span>
        </a>

    </span>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar " v-model="filter" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item" v-for="tap in taps">
                        <a href="#" class="nav-link">
                            <i :class="tap.icon"></i>
                            <p>{{ tap.name }}</p>
                        </a>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>

<script>
    export default {
        name: "SideBar",
        created() {
            this.tempTap = this.taps;
        },
        data() {
            return {
                filter: "",
                tempTap: [],
                taps: [
                    {
                        name: "Dashboard",
                        icon: "nav-icon fas fa-home-alt",
                    },
                    {
                        name: "Coupon",
                        icon: "nav-icon fas fa-gifts",
                    },
                    {
                        name: "Send Notification",
                        icon: "nav-icon fas fa-bells",
                    },
                    {
                        name: "Activity Log",
                        icon: "nav-icon fas fa-history",
                    },
                    {
                        name: "Payment",
                        icon: "nav-icon fab fa-cc-visa",
                    },
                ]
            }
        },
        watch: {
            filter(newValue,oldVal) {
                this.taps = this.tempTap;
                this.taps = this.taps.filter(tap => tap.name.includes(newValue) )
            }
        }
    }
</script>

<style scoped>

</style>
