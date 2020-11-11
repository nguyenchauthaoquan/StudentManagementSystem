<template>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top flex-md-nowrap p-0 shadow">
            <div class="container-fluid">
                <button class="menu-toggle" v-on:click="isActive">
                    <i class="fas fa-bars"></i>
                </button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse" v-on:click.stop="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav ml-auto px-3">
                    <li class="nav-item">
                        <router-link to="#" class="nav-link text-nowrap">Sign out</router-link>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="sidebar col-md-3 col-lg-2" :class="{'active': active}">
                    <div class="sidebar-nav">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <router-link to="#" class="nav-link">
                                    <i class="fas fa-chart-line"></i><span>Dashboard</span>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="#" class="nav-link">
                                    <i class="fas fa-university"></i><span>Faculty Management</span>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="#" class="nav-link">
                                    <i class="fas fa-chart-line"></i><span>Education Programs Management</span>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="#" class="nav-link">
                                    <i class="fas fa-chart-line"></i><span>Groups Management</span>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link :to="{name: 'students'}" class="nav-link">
                                    <i class="fas fa-school"></i><span>Student Management</span>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="#" class="nav-link">
                                    <i class="fas fa-chalkboard-teacher"></i><span>Teacher Management</span>
                                </router-link>
                            </li>
                        </ul>
                        <h6 class="sidebar-heading px-3 mt-4 mb-1 text-white">
                            <span>Education Programs</span><i class="fas fa-plus-circle"></i>
                        </h6>
                        <ul class="nav flex-column"></ul>
                    </div>

                </div>
                <div class="main col-md-9 ml-md-auto col-lg-10 px-md-4" :class="{'active': active}">
                    <transition name="fade">
                        <router-view></router-view>
                    </transition>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                active: false,
                collapsed: false,
            }
        },
        methods: {
            isActive: function () {
                this.active = !this.active;
            },
            collapse: function () {
                this.collapsed = !this.collapsed;
            }
        }
    }
</script>
