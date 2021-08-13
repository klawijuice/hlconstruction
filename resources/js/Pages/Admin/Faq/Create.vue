<template>

<div>
    <!-- pageheader  -->
        <!-- ============================================================== -->
        <page-header>
            <template #bigTitle> FAQ</template>
            <template #lv1> Creer un Faq</template>
        </page-header>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <div class="row">

        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="submit()">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Votre Question ?</label>
                            <input id="name" v-model="form.name" type="text" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('name') }">
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        
                        <div class="form-group">
                            <label for="content">Votre reponse</label>
                            <textarea class="form-control" name="content" v-model="form.content"
                            id="content" rows="3" :class="{ 'is-invalid': form.errors.has('content') }"></textarea>
                            <has-error :form="form" field="content"></has-error>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for="sort_order" class="col-form-label">Ordre</label>
                            <input id="sort_order" v-model="form.sort_order" type="number" min="0" max="100" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('sort_order') }">
                            <has-error :form="form" field="sort_order"></has-error>
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
</div>
</div>


</template>
<script>
import AdminLayout from '@/Layouts/AdminLayout'
import PageHeader from '@/components/PageHeader'
import DataTable from '@/components/DataTable'
import {HalfCircleSpinner} from 'epic-spinners'



export default {
    metaInfo: { title: 'Portfolios' },  // metainfo permet de personnaliser la meta donnée Title dans le header de la page
    layout: AdminLayout,
    components:{
        DataTable,
        HalfCircleSpinner,
        PageHeader,
    },
    props:['portfolio','faq'],
    data() {
            return {
                formUpdate:false,
                loading:false,
                form:this.getForm(),
                portfolioId:null,
            }
        },
    methods: {

        getForm() {
            let item = this.faq
            if (item === undefined) {
                return new Form({
                    _method: 'POST',
                    name:null,
                    content:null,
                    sort_order:0,
                })
            }
            
            return new Form({
                _method: 'PUT',
                name: item.name[this.$page.locale],
                content: item.content[this.$page.locale],
                sort_order: item.sort_order,
            })
        },
        
        resetForm(){
            this.formUpdate=false;
            this.form.reset();
            this.multiSelectValue=[];
        },

        /*
        la fonction submit contient deux logique qui s'execute en fonction de l'etat du boolean formUpdate:
        par defaut formUpdate est false
        - si formUpdate est false : la fonction submit executera le formulaire en mode POST
        - si formUpdate est true : la fonction submit executera le formulaire en mode PATCH
         */

        submit() {
            if (this.formUpdate == true) {
                // Mode patch
                this.loading=true;
                
                this.form.submit('put', route('admin.faq.update',this.faq.id).url())
                .then((result) => {
                    //console.log(result)
                    this.formUpdate=false;
                    this.loading=false;
                    this.toastalert('Mise à jour effectuer')
                    window.location = route('admin.faq.index');
                    this.form.reset()

                }).catch((err) => {
                    this.loading=false;
                    if (err.response.status==401) {
                        this.formUpdate=false
                        EventBus.$emit('errorSignal', err.response.data);
                    }
                    // EventBus.$emit('errorSignal', err.response.data);
                });
            } else {

                // Mode post

                this.loading=true;
                this.form.submit('post', route('admin.faq.store').url())
                .then((result) => {
                    this.loading=false;
                    this.toastalert('Le portfolio a été enregistré')
                    this.form.reset()

                }).catch((err) => {
                    this.loading=false;
                });

            }

        },
        /**
         * fillFormData permet de :
         * Remplir les données du formulaire
         * changer la valeur de formUpdate a true pour l'execution du de la fonction submit en mode patch
         */
        fillFormData(item){
            this.loadingOfMultiSelect=true;
            this.form.reset();
            this.multiSelectValue=[];
            axios.get(route('portfolio.filter.groups',item.id))
            .then((result) => {
                let data=result.data;
                /**
                 * cette boucle permet d'ajouter les categories recuperés depuis
                 * la base de données en fonction de l'id du portfolio dans le tableau multiSelectValue
                 */
                for (let j = 0; j < data.length; j++) {
                    const element = data[j];
                    this.multiSelectValue.push(element)
                }
                this.form.name=item.name;
                this.form.description=item.description
                this.form.link = (item.link !== null) ? item.link : ''
                this.loadingOfMultiSelect=false
            }).catch((err) => {
            });

            this.portfolioId=item.id;
            this.formUpdate=true;
        },
        

        itemToDelete(data){
            axios.delete(route('admin.portfolio.destroy',data.id))
            .then((result) => {
                this.removeData(result.data.id)
                this.toastalert('Portfolio supprimé') // affiche une toast alert du validation de suppression
            }).catch((err) => {
                console.log(err)
            });
        }

    },
    updated() {
        if (this.portfolioId !== null){
            this.form._method = "PUT"
        }else {
            this.form._method = "POST"
        }
    },
    mounted(){
        if (this.faq) {
            this.formUpdate=true
        }
        /**
         * updateDatatable est un evenement qui éxecute la fonction removeData
         */
        EventBus.$on('updateDatatable',data=> this.removeData(data) );
        EventBus.$on('itemToUpdate',data=> this.fillFormData(data) );
        EventBus.$on('itemToDelete',data=> this.itemToDelete(data) );
    }

}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
    .multiselect__tag{
        background:#2d2683;
    }

    .multiselect.invalid .multiselect__tags {
    border: 1px solid #f86c6b !important;
    }

    .multiselect__tag-icon:after {
        color: #fff !important;
    }

    .multiselect__tag-icon:focus,
    .multiselect__tag-icon:hover {
    background: #5951af !important;
    color:#fff;
    }

    .multiselect__tag-icon:focus:after,
    .multiselect__tag-icon:hover:after {
    color: #ffff !important;
    }


</style>
