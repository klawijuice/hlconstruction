<template>
    <div class="bg-gray-100">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <dashboard-header/>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <left-sidebar :url="currentUrl()"/>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-influence">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- content page  -->
                    <slot></slot>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <dashboard-footer/>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
        <!-- Modal Portal -->
        <portal-target name="modal" multiple>
        </portal-target>
    </div>
</template>

<script>
import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
import JetApplicationMark from '@/Jetstream/ApplicationMark'
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import JetNavLink from '@/Jetstream/NavLink'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
import DashboardHeader from '@/components/DashboardHeader'
import LeftSidebar from '@/components/LeftSidebar'
import DashboardFooter from '@/components/DashboardFooter'
import {Matice} from "../../assets/js/matice_translations"

window.Matice = Matice
import {__, trans, setLocale} from "matice"

export default {
    components: {
        JetApplicationLogo,
        JetApplicationMark,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
        DashboardHeader,
        LeftSidebar,
        DashboardFooter,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        }
    },

    methods: {
        switchToTeam(team) {
            this.$inertia.put('/current-team', {
                'team_id': team.id
            }, {
                preserveState: false
            })
        },

        currentUrl() {
            return location.href
        },
        errorSignal(data) {
            // console.log(data);
            swal.fire({
                icon: 'warning',
                title: data.message + ' !',
                confirmButtonText: 'Se connecter ?'
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
        },

        logout() {
            axios.post(route('admin.logout')).then(response => {
                window.location = route('admin.login');
            })
        },
        getLocale () {
            return this.$page.locale
        }
    },

    computed: {
        path() {
            return window.location.pathname
        },

    },
    mounted() {
        setLocale(this.getLocale())
        /**
         * updateDatatable est un evenement qui éxecute la fonction removeData
         */
        EventBus.$on('errorSignal', data => this.errorSignal(data));
        // EventBus.$on('currentPage',data=> console.log(data) );
    },
    updated(){
        setLocale(this.getLocale())
        //this.$forceUpdate()
    }
}
</script>
