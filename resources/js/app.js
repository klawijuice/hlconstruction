require('./bootstrap');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
// import { InertiaProgress } from '@inertiajs/progress'
import { InertiaForm } from 'laravel-jetstream';
import VueMeta from 'vue-meta';
import PortalVue from 'portal-vue';
import { Form, HasError, AlertError } from 'vform';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import Multiselect from 'vue-multiselect'
import moment from 'moment'
import swal from 'sweetalert2'

// InertiaProgress.init()
window.swal = swal;

Vue.filter('formatDate', function(value){
    if (value) {
        return moment(String(value)).format('DD MMM YYYY')
    }
})
Vue.mixin({
    methods:{
    route,
    toastalert(message,icon = 'success'){
        toast.fire({
            icon: icon,
            title: message
        })
    },
    alert(message,icon = 'success'){
        swal.fire({
        title: message,
        timer: 2000,
        icon: icon,
        timerProgressBar: true,
        })
    },
    errorHas(name){
        if (this.errorsForm) {
            if (this.errorsForm[name]) {
                return true;
            }
        }
    },
 },
    // directives: {
    //     ClickOutside
    // },
 });
//  InertiaProgress.init({
//     // The delay after which the progress bar will
//     // appear during navigation, in milliseconds.
//     delay: 250,

//     // The color of the progress bar.
//     color: '#29d',

//     // Whether to include the default NProgress styles.
//     includeCSS: true,

//     // Whether the NProgress spinner will be shown.
//     showSpinner: false,
//   })
//Vue.mixin(require('./base'))

import { Matice } from "../assets/js/matice_translations"
window.Matice = Matice
import {__, trans, setLocale,getLocale, transChoice} from "matice"
Vue.mixin({
    methods: {
        $trans: trans,
        $__: __,
        $transChoice: transChoice,
        $setLocale: (locale) => {
            setLocale(locale);
            this.$forceUpdate() // Refresh the vue instance after locale change.
        },
        // The current locale
        $locale() {
            return getLocale()
        },
        $getTranslated(item){
            return item[getLocale()]
        },
        // A listing of the available locales
        $locales() {
            return locales()
        }
    },
})

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(VueMeta)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
// Vue.use(Form)

// register globally
Vue.component('multiselect', Multiselect)
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
const app = document.getElementById('app');
window.EventBus= new Vue();
window.Form = Form;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: false,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', swal.stopTimer)
      toast.addEventListener('mouseleave', swal.resumeTimer)
    }
  })
window.toast = toast;
new Vue({
    metaInfo: {
        titleTemplate: (title) => title ? `${title} - Fienibini Admin` : 'Fienibini Admin'
    },
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        })
}).$mount(app);
