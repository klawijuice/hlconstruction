<template>
    <div>
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <page-header>
            <template #bigTitle>Enregistrer un produit</template>
            <template #lv1>Create Post</template>
        </page-header>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="submit()">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Le titre de l'article</label>
                                    <input id="name" v-model="form.name" type="text" class="form-control"
                                           :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <b-form-group label="L'article est-il encore un
                                        brouillon?">
                                        <b-form-radio v-model="form.state" name="state"
                                                      :class="{ 'is-invalid': form.errors.has('state') }" value="0">Oui
                                        </b-form-radio>
                                        <b-form-radio v-model="form.state" name="state"
                                                      :class="{ 'is-invalid': form.errors.has('state') }" value="1">Non
                                        </b-form-radio>
                                        <has-error :form="form" field="state"></has-error>
                                    </b-form-group>

                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <b-form-group label="Voulez-vous publier l'article?">
                                        <b-form-radio v-model="form.confirmed" name="confirmed"
                                                      :class="{ 'is-invalid': form.errors.has('confirmed') }" value="1">
                                            Oui
                                        </b-form-radio>
                                        <b-form-radio v-model="form.confirmed" name="confirmed"
                                                      :class="{ 'is-invalid': form.errors.has('confirmed') }" value="0">
                                            Non
                                        </b-form-radio>
                                        <has-error :form="form" field="confirmed"></has-error>
                                    </b-form-group>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <b-form-group label="Peut-on commenter cette article?">
                                        <b-form-radio v-model="form.commentable" name="commentable"
                                                      :class="{ 'is-invalid': form.errors.has('commentable') }" value="1">
                                            Oui
                                        </b-form-radio>
                                        <b-form-radio v-model="form.commentable" name="commentable"
                                                      :class="{ 'is-invalid': form.errors.has('commentable') }" value="0">
                                            Non
                                        </b-form-radio>
                                        <has-error :form="form" field="commentable"></has-error>
                                    </b-form-group>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="categories" class="col-form-label">Les catégories</label>
                                    <multiselect
                                        v-model="form.categories"
                                        tag-placeholder="Sélectionner les catégories"
                                        placeholder="Sélectionner les catégories"
                                        label="name"
                                        track-by="id"
                                        :options="categories"
                                        :multiple="true"
                                        :taggable="true"
                                        @tag="addTag"
                                        :class="{ 'is-invalid invalid': form.errors.has('categories') }"></multiselect>
                                    <has-error :form="form" field="categories"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" v-model="form.description"
                                              id="description" rows="3"
                                              :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                                    <has-error :form="form" field="description"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <b-form-file
                                        v-model="form.poster"
                                        name="poster"
                                        accept="image/jpeg, image/png"
                                        @change="selectPoster"
                                        placeholder="Choose a file or drop it here..."
                                        drop-placeholder="Drop file here..." plain
                                    ></b-form-file>
                                    <has-error :form="form" field="poster"></has-error>
                                </div>
                            </div>
                            <div class="col-12 col-md-6" v-html="getPoster"></div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div :class="{ 'is-invalid': form.errors.has('content') }"></div>
                                <has-error :form="form" field="content"></has-error>
                                <summernote
                                    id="content"
                                    name="content"
                                    :model="form.content"
                                    v-on:change="value => { form.content = value }"
                                ></summernote>
                            </div>
                        </div>
                        <div class="row  mt-5">
                            <div class="col-12">
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
                                    <button class="btn btn-outline-secondary" type="button" @click="resetForm">

                                        <i class="fas fa-sync-alt"></i> Annuler
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AdminLayout from '@/Layouts/AdminLayout'
import PageHeader from '@/components/PageHeader'
import {HalfCircleSpinner} from 'epic-spinners'
import summernote from "@/components/Summernote"
import objectToFormData from './../../public/objectToFormData'


export default {
    metaInfo: { title: 'Enregistrer un produit' },  // metainfo permet de personnaliser la meta donnée Title dans le header de la page
    layout: AdminLayout,
    props: ['categories', 'post'],
    components: {
        HalfCircleSpinner,
        summernote,
        PageHeader,
    },
    data() {
        return {
            loading: false,
            value: [],
            form: this.getForm(),
        }
    },
    computed: {
        getPoster: function () {
            if(this.post !== undefined){
                this.post.posterObject = this.post.poster
            }
            if (this.post === undefined || (this.post.posterObject === undefined || this.post.posterObject === null || this.post.posterObject.length === 0)) {
                return ""
            }
            return "<img src='/storage/products/" + this.post.id + "/" + this.post.posterObject.name + "' style='max-width: 200px;' alt='" + this.post.name + "'>"
        }
    },
    methods: {
        selectPoster(e) {
            this.form.poster = e.target.files[0];
        },
        getForm() {
            let item = this.post
            if (item === undefined) {
                return new Form({
                    _method: 'POST',
                    name: null,
                    description: null,
                    content: null,
                    state: 0,
                    confirmed: 0,
                    poster: [],
                    posterObject: [],
                    categories: [],
                    commentable: 1,
                })
            }
            return new Form({
                _method: 'PUT',
                name: item.name[this.$page.locale],
                description: item.description[this.$page.locale],
                content: item.content[this.$page.locale],
                state: item.state,
                confirmed: item.confirmed,
                categories: item.categories,
                poster: [],
                posterObject: item.poster,
                commentable: item.commentable,
            })
        },
        /**
         * Boutton de reinitialisation du formulaire
         */
        resetForm() {
            this.form.reset();
        },
        addTag(newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
            }
            this.options.push(tag)
            this.value.push(tag)
        },
        submit() {
            this.loading = true;
            if (this.post === undefined) {
                this.form.submit('post', route('admin.products.store').url(), {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    // Transform form data to FormData
                    transformRequest: [function (data, headers) {
                        return objectToFormData(data)
                    }],
                    onUploadProgress: e => {
                        // Do whatever you want with the progress event
                        // console.log(e)
                    }
                })
                    .then((result) => {
                        this.loading = false
                        this.form.reset()
                        //console.log(result)

                        window.location = route('admin.products.index').url()
                    }).catch((err) => {
                    this.loading = false;
                    console.log(err.response)
                    if (err && err.response && err.response.status && err.response.status == 401) {
                        EventBus.$emit('errorSignal', err.response.data);
                    }
                });
            } else {
                this.form.submit('post', route('admin.products.update', this.post.id).url(), {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    // Transform form data to FormData
                    transformRequest: [function (data, headers) {
                        return objectToFormData(data)
                    }],
                    onUploadProgress: e => {
                        // Do whatever you want with the progress event
                        // console.log(e)
                    }
                }).then((data) => {
                    this.loading = false
                    this.form.reset()
                    //console.log(data)
                    window.location = route('admin.products.index').url()
                }).catch((err) => {
                    console.log(err.response)
                    this.loading = false;
                    if (err && err.response && err.response.status && err.response.status == 401) {
                        EventBus.$emit('errorSignal', err.response.data);
                    }
                });
            }
        }
    },
    mounted() {
    },

}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
.multiselect__tag {
    background: #2d2683;
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
    color: #fff;
}

.multiselect__tag-icon:focus:after,
.multiselect__tag-icon:hover:after {
    color: #ffff !important;
}

</style>
