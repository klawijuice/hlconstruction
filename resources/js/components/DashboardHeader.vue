<template>
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" :href="route('admin.pages.dashboard')"> {{ $page.appName }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-left fa-xs"></i>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item">
                        <div id="custom-search" class="top-search-bar">
                            <input class="form-control" type="text" placeholder="Search..">
                        </div>
                    </li>
                    <li class="nav-item dropdown connection">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> <i class="fas fa-language"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right ">
                            <li class="px-2">
                                <inertia-link :href="this.$page.getLocalizedFrenchURL" @click.prevent="changeLocale" lang="fr"
                                              class="block text-gray-500 hover:no-underline w-full hover:bg-gray-300 px-1 transition ease-in-out duration-500">
                                    <i class="flag-icon flag-icon-fr"></i> French
                                </inertia-link>
                            </li>
                            <li class="px-2">
                                <inertia-link :href="this.$page.getLocalizedEnglishURL" @click.prevent="changeLocale" lang="en"
                                              class="block text-gray-500 hover:no-underline w-full hover:bg-gray-300 px-1 transition ease-in-out duration-500">
                                    <i class="flag-icon flag-icon-us"></i> English
                                </inertia-link>
                            </li>
                            <li class="px-2">
                                <inertia-link :href="this.$page.getLocalizedChineseURL" @click.prevent="changeLocale" lang="zh"
                                              class="block text-gray-500 hover:no-underline w-full hover:bg-gray-300 px-1 transition ease-in-out duration-500"><i class="flag-icon flag-icon-cn"></i> Chinese</inertia-link>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><img :src="$page.user.profile_photo_url" alt=""
                                                                           class="user-avatar-md rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                             aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">{{ $page.user.name }}</h5>
                                <span class="status"></span><span class="ml-2">Available</span>
                            </div>
                            <inertia-link class="dropdown-item" :href="route('admin.profile.show')"><i
                                class="fas fa-user mr-2"></i>Account
                            </inertia-link>
                            <!-- <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a> -->
                            <!-- Authentication -->
                            <form @submit.prevent="logout">
                                <jet-dropdown-link as="button">
                                    Logout
                                </jet-dropdown-link>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>
<script>
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import Button from "../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button";
import {setLocale} from "matice"

export default {
    components: {
        Button,
        JetDropdown,
        JetDropdownLink,
    },
    props: ['props'],
    data() {
        return {
            lang: null
        }
    },
    methods: {
        changeLocale(e){
            setLocale(e.target.getAttribute('lang'))
            this.$forceUpdate()
            window.location = e.target.getAttribute('href')
        },
        logout() {
            axios.post(route('admin.logout').url()).then(response => {
                window.location = route('admin.login');
            })
        }
    },
    mounted() {
    },
}
</script>
<style>
.profile-fade-enter-active {
    transition: all .3s ease;
}

.profile-fade-leave-active {
    transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.profile-fade-enter
    /* .profile-fade-leave-active below version 2.1.8 */
{
    transform: translateY(10%);
    opacity: 0;
}

.profile-fade-leave-to {
    transform: translateY(-30%);
    opacity: 0;
}
</style>
