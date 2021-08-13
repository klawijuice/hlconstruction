<template>
    <div>
        <!-- influencer profile  -->
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <page-header>
            <template #bigTitle>{{ $trans('admin.layout.dashboard') }}</template>
            <template #lv1>Home</template>
        </page-header>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card influencer-profile-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="text-center">
                                    <img :src="$page.user.profile_photo_url" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                                <div class="user-avatar-info">
                                    <div class="m-b-20">
                                        <div class="user-avatar-name">
                                            <h2 class="mb-1"> {{ $page.user.name }} </h2>
                                        </div>
                                        <div class="d-inline-block"></div>
                                    </div>
                                    <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
                                    <div class="user-avatar-address">
                                        <p class="border-bottom pb-3">
                                        <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i>
                                        <span v-if="$page.user.district">{{ $page.user.district }}</span>
                                        <span v-if="!$page.user.district"> ...</span>
                                        , <span v-if="$page.user.city">{{$page.user.city}}</span>
                                        <span v-if="!$page.user.city">Ajoutez votre ville ...</span>
                                        </span>
                                            <span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Date d'inscription: {{$page.user.created_at}}  </span>
                                            <span class=" mb-2 d-xl-inline-block d-block ml-xl-4" v-if="$page.user.district">Birthday: {{ $page.user.date_birth | formatDate }}</span>
                                            <span class=" mb-2 d-xl-inline-block d-block ml-xl-4" v-if="!$page.user.district">Birthday: Ajouter une date ...</span>
                                        </p>
                                        <!-- <div class="mt-3">
                                            <a href="#" class="badge badge-light mr-1">
                                                Fitness
                                            </a>
                                            <a href="#" class="badge badge-light mr-1">Life Style</a>
                                            <a href="#" class="badge badge-light">Gym</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end influencer profile  -->
        <!-- widgets   -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- four widgets   -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- total Posts   -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">{{ $trans('admin.layout.total product') }}</h5>
                            <h2 class="mb-0">{{ stats.all }}</h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                            <i class="fa fa-newspaper fa-fw fa-sm text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end total Posts   -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- total Posts Online   -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">{{ $trans('admin.layout.product online') }}</h5>
                            <h2 class="mb-0">{{ stats.online }}</h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                            <i class="fa fa-eye fa-fw fa-sm text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end total Posts Online   -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Total Posts OffLine   -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">{{ $trans('admin.layout.product offline') }}</h5>
                            <h2 class="mb-0">{{ stats.offline }}</h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                            <i class="fa fa-eye-slash fa-fw fa-sm text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end Total Posts OffLine   -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- total Categories   -->
            <!-- ============================================================== -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h5 class="text-muted">{{ $trans('admin.layout.total category') }}</h5>
                            <h2 class="mb-0">{{ stats.categories }}</h2>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                            <i class="fa fa-book fa-fw fa-sm text-brand"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end total Categories   -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end widgets   -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- campaign activities   -->
            <!-- ============================================================== -->
            <div class="col-lg-12">
                <div class="section-block">
                    <h3 class="section-title">{{ $trans('admin.layout.my latest products.title') }}</h3>
                </div>
                <div class="card">
                    <div class="campaign-table table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="border-0">
                                <th class="border-0">{{ $trans('admin.layout.my latest products.name') }}</th>
                                <th class="border-0">{{ $trans('admin.layout.my latest products.description') }}</th>
                                <th class="border-0">{{ $trans('admin.layout.my latest products.state') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="post in posts" :key="post.id">
                                <td>{{ $getTranslated(post.name) }}</td>
                                <td>{{ $getTranslated(post.description) }}</td>
                                <td>
                                    <span class="badge badge-success" v-if="post.state == 1 && post.confirmed == 1">
                                        En ligne
                                    </span>
                                    <span class="badge badge-warning" v-if="post.state == 0">
                                        Brouillon
                                    </span>
                                    <span class="badge badge-success" v-if="post.confirmed == 0">
                                        Hors ligne
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end campaign activities   -->
            <!-- ============================================================== -->
        </div>
    </div>

</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout'
import PageHeader from '@/components/PageHeader'
import { Matice } from "../../../assets/js/matice_translations"
window.Matice = Matice
import {__, trans, setLocale, getLocale, transChoice} from "matice"

export default {
    metaInfo: { title: trans('admin.layout.dashboard') },  // metainfo permet de personnaliser la meta donnée Title dans le header de la page
    layout: AdminLayout,
    components:{
        PageHeader,
    },
    props:['stats','posts'],
    data() {
        return {
            currentPage: trans('admin.layout.dashboard')
        }
    },
    mounted(){
        setLocale(this.$page.locale)
    }/*,
    updated(){
        setLocale(this.$page.locale)
        this.$forceUpdate()
    }*/
}
</script>
