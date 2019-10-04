require('./bootstrap');
window.Vue = require('vue');

import router from './routes/routers';
import store from './vuex/store';
import Snotify from 'vue-snotify';
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'

Vue.use(VueMaterial)
Vue.use(Snotify,{
    showProgressBar: false,
})


/**
 * Global Components
 */
Vue.component('preloader-component', require('./components/layouts/PreloaderComponent').default)
Vue.component('button-destroy-component', require('./components/admin/layouts/ButtonDestroyComponent').default)

const app = new Vue({
    router: router,
    store: store,
    el: '#app',
});

// Load Store  no icinio da aplicação
store.dispatch('loadSlides');
