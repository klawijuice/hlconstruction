<template>
    <div>
        <b-row class=" pb-2">
            <b-col md="3">
                <div class="clearfix">
                    <b-form-input v-model="filter" class="float-right" type="search" placeholder="Search ..."></b-form-input>
                </div>
            </b-col>
        </b-row>
        <b-row>
            <b-col >
                <b-table
                striped
                hover
                bordered
                :items="items"
                :fields="fields"
                :filter="filter"
                :per-page="perPage"
                :current-page="currentPage"
                >
                <template v-slot:cell(actions)="data">
                    <span v-if="updateInOtherPage">
                            <inertia-link :href="route(routeUpdate,data.item)" class=" btn btn-primary btn-sm rounded-circle"><b-icon icon="pencil-square"></b-icon></inertia-link>
                        </span>
                        <b-button pill variant="primary" size="sm" v-show="!updateInOtherPage" @click="itemToUpdate(data.item)"><b-icon icon="pencil-square"></b-icon></b-button>
                        <b-button pill variant="danger" size="sm" v-b-modal.bv-modal-example @click="showDeleteModal(data.item)"><b-icon icon="trash"></b-icon></b-button>
                        </template>
                </b-table>
                <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage"></b-pagination>
            </b-col>
        </b-row>
        <!-- Modal de confirmation de Suppression-->
        <b-modal v-model="show">
            <template #modal-header>
                <h5>Confirm Delete</h5>
            </template>

            <template #default>
            Voulez-vous vraiment supprimer ?
            </template>

            <template #modal-footer>
                <b-button class="mt-3" variant="primary"  @click="show=false">Non</b-button>
                <b-button class="mt-3" variant="danger"  @click="confirmDeleteModal(deleteObjet)">Oui</b-button>
            </template>
        </b-modal>
    </div>
</template>
<script>
import DialogModalDelete from './DialogModalDelete'
export default {
    components:{
        DialogModalDelete,
    },
    props:{
        data:{type:Array},
        link:{type:String},
        fields: {type:Array, default : () => { return ['name', 'created_at', 'actions'] }},
        perPage: {type:Number, default: 5},

        updateInOtherPage: {type:Boolean, default: false},
        routeUpdate:{type:String,default: '#'},
    },
    data() {
        return {
            items:this.data,
            filter:'',
            show:false,
            currentPage:1,
            objectToPass: null,
            showDelete: false,
            deleteObjet:null,
        }
    },
    computed: {
        rows(){
            return this.items.length;
        }
    },
    methods:{
        // methode permettant d'afficher le modal de confirmation de mot de passe
        showDeleteModal(data){
            this.deleteObjet=data
            this.show=!this.show
        },
        confirmDeleteModal(data){
            EventBus.$emit('itemToDelete', data)
            this.show=false
        },
        itemToUpdate(data){
            EventBus.$emit('itemToUpdate', data)
        }
    },
}
</script>
