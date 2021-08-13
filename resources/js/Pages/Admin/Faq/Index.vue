<template>
    <div>
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <page-header >
            <template #bigTitle>FAQ</template>
            <template #lv1>Index</template>
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
                                :href="route('admin.faq.index')">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total faq</h5>
                                    <h2 class="mb-0">{{ stats.all }}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                    <i class="fa fa-eye fa-fw fa-sm text-info"></i>
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
                            <h5 class="mb-0">Liste des Faq</h5>
                        </div>
                        <div class="card-body">
                            <inertia-link :href="route('admin.faq.create')" preserve-scroll class="w-1/6 float-right bg-gray-500 text-center hover:bg-gray-400 rounded-md text-white cursor-pointer hover:shadow-md transition duration-700 py-2 px-1">
                            Créer un Faq <i class="ti-plus"></i>
                            </inertia-link>
                            <data-table :data="modelItems"
                                        :fields="fields"
                                        :updateInOtherPage="true"
                                        routeUpdate="admin.faq.edit"
                                        :per-page="15"
                                        ></data-table>
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
import DataTable from '@/components/DataTable'
// import PostDataTable from "./PlanDataTable"
import { HalfCircleSpinner } from 'epic-spinners'

export default {
    metaInfo: { title: 'Portfolios' },  // metainfo permet de personnaliser la meta donnée Title dans le header de la page
    layout: AdminLayout,
    components:{
        DataTable,
        HalfCircleSpinner,
        PageHeader,
    },
    props:['faqs', 'stats'],
    data() {
        return {
            modelItems: this.faqs,
            show:false,
            groupId:null,
            loading:false,
            formUpdate:false,
            form: new Form ({
                name:null,
                description:null,
            }),
            fields: [
                {
                    key: 'sort_order',
                    label:'Ordre'
                },
                {
                    key: 'name.'+this.$page.locale,
                    label:'Question'
                },
                {
                    key: 'content.'+this.$page.locale,
                    label:'Reponse'
                },
                'actions'
            ],
        }
    },
    methods: {
        resetForm(){
            this.form.reset()
            this.loading=false
            this.show=false
        },
        showModal() {
            this.show=!this.show
        },
        /**
         * la fonction updateNameInArray permet de faire une mise a jour du tableau dans la vue apres la modification d'un elemant
         */
        updateNameInArray(data){
            const index = this.modelItems.findIndex((item => item.id==data.id))
            this.modelItems.splice(index,1,data)
            this.resetForm();
        },

        /**
         la fonction removeData permet de faire une mise a jour du tableau de données dans la vue apres une suppression
         */
        removeData(data) {
            const index = this.modelItems.findIndex(function (item) {
                return item.id == data
            });
            this.modelItems.splice(index, 1);
        },

        itemToDelete(data){ 
            axios.delete(route('admin.faq.destroy',data.id).url()) // supprime la donnée dans la base donnée via une requete axios
            .then((result) => {
                this.removeData(result.data) //supprime la data dans la datatable au niveau de la vue
                this.toastalert('faq supprimé') // affiche une toast alert du validation de suppression
            })
        }
       
    },
    mounted(){
        EventBus.$on('itemToDelete', data => this.itemToDelete(data));
        EventBus.$on('itemToUpdate', data => this.updateName(data));

    },

}
</script>
