<template>
    <div>
        <b-row class=" pb-2">
            <b-col md="3">
                <div class="clearfix">
                    <b-form-input v-model="filter" class="float-right" type="search"
                                  placeholder="Search ..."></b-form-input>
                </div>
            </b-col>
        </b-row>
        <b-row>
            <b-col>
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
                        <inertia-link :href="route('admin.posts.edit', data.item.id)">
                            <b-button variant="primary" size="sm" text-variant="light">
                                <i class="fas fa-edit"></i>
                            </b-button>
                        </inertia-link>
                        <b-button variant="danger" size="sm" v-b-modal.bv-modal-example
                                  @click="showDeleteModal(data.item.id)"><i class="fas fa-trash"></i></b-button>
                    </template>
                </b-table>
                <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage"></b-pagination>
            </b-col>
        </b-row>
        <!-- Modal de confirmation de Suppression-->
        <dialog-modal-delete v-if="showDelete" :modal.sync="showDelete" :passedObject="objectToPass"
                             :link="link"></dialog-modal-delete>
    </div>
</template>
<script>
import DialogModalDelete from './../../../components/DialogModalDelete'

export default {
    components: {
        DialogModalDelete,
    },
    props: {
        data: {type: Array},
        link: {type: String},
        fields: {type: Array, default: ['name', 'created_at', 'actions']},
        perPage: {type: Number, default: 5}
    },
    data() {
        return {
            items: this.data,
            filter: '',
            currentPage: 1,
            objectToPass: null,
            showDelete: false,
        }
    },
    computed: {
        rows() {
            return this.items.length;
        }
    },
    methods: {
        // methode permettant d'afficher le modal de confirmation de mot de passe
        showDeleteModal(item) {
            this.showDelete = true
            this.objectToPass = item
        },
        updateItem(data) {
            EventBus.$emit('updateItem', data)
        }
    },
}
</script>
