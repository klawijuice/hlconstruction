<template>
    <div>
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <page-header :level2="true">
            <template #bigTitle>{{ title }}</template>
        </page-header>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <div class="col-12">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <inertia-link
                                class="nav-link"
                                :href="route('admin.posts.index')">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">{{ $trans('admin.layout.total product') }}</h5>
                                    <h2 class="mb-0">{{ stats.all }}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                    <i class="fa fa-eye fa-fw fa-sm text-info"></i>
                                </div>
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <inertia-link
                                class="nav-link"
                                :href="route('admin.posts.online')">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">{{ $trans('admin.layout.post online') }}</h5>
                                    <h2 class="mb-0">{{ stats.online }}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                    <i class="fa fa-eye fa-fw fa-sm text-success"></i>
                                </div>
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <inertia-link
                                class="nav-link"
                                :href="route('admin.posts.drafts')">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">{{ $trans('admin.layout.post draft') }}</h5>
                                    <h2 class="mb-0">{{ stats.drafts }}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-warning-light mt-1" style="background-color: #ffc10854; color: #fff;">
                                    <i class="fa fa-eye fa-fw fa-sm text-warning"></i>
                                </div>
                            </inertia-link>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <inertia-link
                                class="nav-link"
                                :href="route('admin.posts.offline')">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">{{ $trans('admin.layout.post offline') }}</h5>
                                    <h2 class="mb-0">{{ stats.offline }}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-danger-light mt-1">
                                    <i class="fa fa-eye fa-fw fa-sm text-danger"></i>
                                </div>
                            </inertia-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Liste des articles</h5>
                        </div>
                        <div class="card-body">
                            <post-data-table :data="modelItems"
                                             :fields="['id', 'name.'+this.$page.locale, 'slug.'+this.$page.locale, 'actions']"
                                             :per-page="15"
                                             :link="link"></post-data-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import AdminLayout from '@/Layouts/AdminLayout'
import PageHeader from '@/components/PageHeader'
import PostDataTable from "./PostDataTable"
import { HalfCircleSpinner } from 'epic-spinners'
import {trans} from "matice";

export default {
    layout: AdminLayout,
    components:{
        PostDataTable,
        HalfCircleSpinner,
        PageHeader,
    },
    props:['posts', 'stats', 'title'],
    metaInfo: { title: 'Les produits' },  // metainfo permet de personnaliser la meta donnée Title dans le header de la page
    data() {
        return {
            currentPage: this.title,
            link:route('admin.posts.index'),
            modelItems: this.posts
        }
    },
    computed:{

    },
    methods: {
        /**
         la fonction removeData permet de faire une mise a jour du tableau de données dans la vue apres une suppression
         */
        removeData(data) {
            const index = this.modelItems.findIndex(function (item) {
                return item.id == data
            });
            this.modelItems.splice(index, 1);
        },
        titleLinks(data){
            let current = data.currentRouteName
            current=current.split('.')

            return this.capitalizeFirstLetter(current[2])
        },

        capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    },
    mounted(){

        EventBus.$on('updateDatatable', data => this.removeData(data));

    },

}
</script>
