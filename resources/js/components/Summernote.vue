<template>
    <textarea :id="id" :name="name"></textarea>
</template>

<script>
import $ from "jquery"

import "popper.js"
import "bootstrap"
import "summernote/dist/summernote.css"
import "summernote/dist/summernote-bs4.css"
import "summernote"
import "summernote/dist/summernote-bs4"
import "summernote/dist/lang/summernote-fr-FR"

export default {
    name: "Summernote",
    props: {
        id: {type: String, default: "editorId"},
        name: {type: String},
        config: {
            type: Object, default: () => {
                return {
                    lang: 'fr-FR',
                    height: 600,
                    dialogsInBody: true,
                    fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '24', '30', '36', '48', '64', '82', '150'],
                    fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather'],
                    fontNamesIgnoreCheck: ['Merriweather'],
                    fontSizeUnits: ['px', 'pt'],
                    lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'italic', 'strikethrough', 'superscript', 'subscript', 'clear']],
                        ['fontname', ['fontname']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['color', ['color']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']],
                        ['height', ['height']],
                        ['fontsize', ['fontsize']]
                        ['fontsizeunit', ['fontsizeunit']]
                    ],
                    popover: {
                        image: [
                            ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                            ['float', ['floatLeft', 'floatRight', 'floatNone']],
                            ['remove', ['removeMedia']]
                        ],
                        link: [
                            ['link', ['linkDialogShow', 'unlink']]
                        ],
                        table: [
                            ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                            ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                        ],
                        air: [
                            ['color', ['color']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['para', ['ul', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture']]
                        ]
                    }
                }
            }
        },
        model: {
            required: true,
        },
    },
    computed: {

    },
    methods: {

    },
    mounted() {
        let vm = this;
        if (vm.config.callbacks === undefined) {
            vm.config.callbacks = {}
        }
        if (vm.config.callbacks.onInit === undefined) {
            vm.config.callbacks.onInit = function () {
                $(vm.$el).summernote("code", vm.model);
            }
        }

        if (vm.config.callbacks.onChange === undefined) {
            vm.config.callbacks.onChange = function () {
                vm.$emit('change', $(vm.$el).summernote('code'));
            }
        }

        if (vm.config.callbacks.onBlur === undefined) {
            vm.config.callbacks.onBlur = function () {
                vm.$emit('change', $(vm.$el).summernote('code'));
            }
        }

        let editor = $("#" + vm.id)
        editor.summernote(vm.config)
        /*editor.on('summernote.change', function(we, contents, $editable) {
            vm.value = contents
        });*/
    }
}
</script>

<style scoped>

</style>
