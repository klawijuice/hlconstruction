<template>
<div>
    <!-- pageheader  -->
        <!-- ============================================================== -->
        <page-header>
            <template #bigTitle>Catégories</template>
            <template #lv1>Categories</template>
        </page-header>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="submit()">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Nom de la categorie</label>
                                    <input id="name" v-model="form.name" type="text" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="description">Description</label>
                                  <textarea class="form-control" name="description" v-model="form.description"
                                   id="description" rows="3" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                                  <has-error :form="form" field="description"></has-error>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="d-flex btn btn-primary" type="submit" :disabled="loading">
                                    <half-circle-spinner
                                        v-if="loading"
                                        :animation-duration="1000"
                                        :size="25"
                                        :color="'#fff'"
                                        class="mr-2"
                                    />
                                    <span>Enregistrer</span>
                                    </button>
                                    <button class="btn btn-outline-secondary" type="button" @click="resetForm" >

                                        <i class="fas fa-sync-alt"></i> Annuler
                                    </button>
                                </div>
                            </form>
                        </div>
                </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Liste des categories</h5>
                </div>
                <div class="card-body">
                    <data-table :data="categoryItem" :fields="['name', 'created_at', 'actions']"></data-table>
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
import {HalfCircleSpinner} from 'epic-spinners'
export default {
    metaInfo: { title: 'Categories' },  // metainfo permet de personnaliser la meta donnée Title dans le header de la page
    layout: AdminLayout,
    components: {
        DataTable,
        HalfCircleSpinner,
        PageHeader,
    },
    props: ['categories'],
    data() {
            return {
                formUpdate:false,
                loading:false,
                categoryItem:this.categories,
                form:new Form({
                    name:null,
                    description:null,
                }),
                categoryId:null, //categoryId recupere l'id de la categorie a modifier
            }
        },
    methods: {
        /**
         * Boutton de reinitialisation du formulaire
         */
        resetForm(){
            this.formUpdate=false;
            this.multiSelectValue=[]
            this.form.reset()

        },
        /*
        la fonction submit contient deux logique qui s'execute en fonction de l'etat du boolean formUpdate:
        par defaut formUpdate est false
        - si formUpdate est false : la fonction submit executera le formulaire en mode POST
        - si formUpdate est true : la fonction submit executera le formulaire en mode PATCH
         */

        submit() {
            if (this.formUpdate) {
                // Mode patch
                this.loading=true;

                this.form.put(route('admin.categories.update',this.categoryId).url())
                .then((result) => {
                    this.refreshTable(result.data);
                    this.formUpdate=false;
                    this.loading=false;
                    this.toastalert('Mise à jour effectuer') //affichage d'une alert de confirmation apres une update

                    }).catch((err) => {
                    this.loading = false;
                    if (err.response.status === 401) {
                        this.formUpdate = false
                        // EventBus.$emit('errorSignal', err.response.data);
                    }
                });
            } else {
                // Mode post

                this.loading=true;

                this.form.post(route('admin.categories.store').url())
                .then((result) => {
                    this.categoryItem.unshift(result.data)
                    this.loading=false
                    this.toastalert('Mise à jour effectuer') //affichage d'une alert de confirmation apres un ajout
                }).catch((err) => {
                    this.loading=false;
                });
            }

        },
        /**
            la fonction removeData permet de faire une mise a jour du tableau de données dans la vue apres une suppression
        */
        removeData(data){
            const index = this.categoryItem.findIndex(function(item) {
            return item.id == data
            });
            this.categoryItem.splice(index, 1);
        },
        /**
         * la fonction refreshTable permet de faire une mise a jour du tableau dans la vue apres la modification d'un elemant
         */
        refreshTable(data){
            const index =this.categoryItem.findIndex((item => item.id==data.id));
            this.categoryItem[index].name=data.name;
            this.categoryItem[index].description=data.description;
            this.resetForm();
        },
        /**
         * updateName permet de :
         * ajouter le nom du groupe dans le champ de saisie du formulaire
         * changer la valeur de formUpdate a true pour l'execution du de la fonction submit en mode patch
         * faire passer les données de l'element a modifier a la fonction submit
         */
        itemToUpdate(item){
            this.form.reset()
            this.form.fill(item)
            this.categoryId=item.id
            this.formUpdate=true
        },

        itemToDelete(data){
            axios.delete(route('admin.categories.destroy',data).url())
            .then((result) => {
                this.removeData(result.data.id)
            }).catch((err) => {
                console.log(err)
            });
        }

    },
    mounted() {
        /**
         * itemToDelete est un evenement qui éxecute la fonction removeData
         */
        EventBus.$on('itemToDelete', data => this.itemToDelete(data));
        EventBus.$on('itemToUpdate', data => this.itemToUpdate(data));
    },

}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
