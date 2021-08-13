<template>
    <b-modal id="bv-modal-example" hide-footer no-close-on-backdrop hide-header-close>
        <slot name="title">
        </slot>
        <div class="d-block text-center">
            <slot name="content">
            </slot>
        </div>

        <slot name="footer">
        </slot>
        <!-- <b-button class="mt-3" variant="primary"  @click="closeModal">Non</b-button>
        <b-button class="mt-3" variant="danger"  @click="confirmModal(item)">Oui</b-button> -->
    </b-modal>
</template>

<script>
    import Modal from './Modal'

    export default {
        components: {
            Modal,
        },

        props: {
            show: {
                default: false
            },
            maxWidth: {
                default: '2xl'
            },
            closeable: {
                default: true
            },
        },

        methods: {
            close() {
                this.$emit('close')
            },
        }
    }
</script>
