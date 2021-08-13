<template>
    <div>
        <b-modal id="bv-modal-example" hide-footer no-close-on-backdrop hide-header-close>
            <template #modal-title>
            Confirmation de suppression
            </template>
            <div class="d-block text-center">
                Voulez-vous vraiment supprimer ?
            </div>
            <b-button class="mt-3" variant="primary"  @click="closeModal">Non</b-button>
            <b-button class="mt-3" variant="danger"  @click="confirmModal(item)">Oui</b-button>
        </b-modal>
    </div>
</template>
<script>
export default {
    props: ['passedObject','link'],
    data() {
        return {
            item:this.passedObject
        }
    },
    computed: {
        dataItem(){
            return this.item;
        }
    },
    methods: {
        closeModal() { //the method to close the modal
            this.$bvModal.hide('bv-modal-example')
            this.$emit('update:modal')

        },
        confirmModal(data){
            axios.delete(this.link+'/'+data)
            .then((result) => {
                // console.log(result.data)
                EventBus.$emit('updateDatatable', result.data.id)
                this.closeModal()


            }).catch((err) => {
                console.log(err)
            });
        }
    }
}
</script>
