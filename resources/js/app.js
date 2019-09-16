require('./bootstrap');
window.Vue = require('vue');

import router from './routes/routers';
import store from './vuex/store';


/**
 * Global Components
 */


 Vue.component('teste-component', require('./components/App').default);


const app = new Vue({
    router,
    store,
    el: '#app',
});
